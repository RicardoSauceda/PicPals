<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(Request $request, User $user)
    {
        // dd('Im: ' . auth()->user()->username . ' and I follow to: ' . $request->user ->username);
        $user->followers()->attach( auth()->user()->id );
        return back();

    }

    public function destroy(Request $request, User $user)
    {
        $user->followers()->detach( auth()->user()->id );
        return back();
    }

}
