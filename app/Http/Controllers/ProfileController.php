<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        return view('profile.index');
    }
    public function store(Request $request)
    {

        $request->request->add(['username' => Str::slug($request->username)]);
        $request->validate([
            'name' => 'required|max:40',
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore(auth()->user()),
                'min:5',
                'max:20',
                Rule::notIn(['edit-profile', 'login'])
            ]
        ]);

        if ($request->image) {
            $image = $request->file('image');

            $imageName = Str::uuid() . '.' . $image->extension();

            $serverImage = Image::make($image);
            $serverImage->fit(1000, 1000);

            $imagePath = public_path('profile_pictures') . '/' . $imageName;
            $serverImage->save($imagePath);
        }

        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->image = $imageName ?? auth()->user()->image ?? NULL;

        if ($request->current_password) {
            if (! Hash::check($request->current_password, $user->password)) {
                return back()->with('message-credentials', 'Incorrect Credentials');
            } else {
                $request->validate([
                    'new_password' => 'required|min:6',
                ]);
                $user->password = bcrypt($request->new_password);
            }
        }

        $user->save();

        return redirect()->route('posts.index', $user->username);
    }
}
