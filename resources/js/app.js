import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

let dropzone = new Dropzone('#dropzone', {
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        if (document.querySelector('[name="image"]').value.trim()) {
            const publishedImage = {};
            publishedImage.size = 1000;
            publishedImage.name = document.querySelector('[name="image"]').value;

            this.options.addedfile.call(this, publishedImage);
            this.options.thumbnail.call(this, publishedImage, `/uploads/${publishedImage.name}`);

            publishedImage.previewElement.classList.add('dz-success', 'dz-complete');
        }
    },
});

dropzone.on("success", function (file, response) {
    document.querySelector('[name="image"]').value = response.image;
});

dropzone.on("removedfile", function () {
    document.querySelector('[name="image"]').value = '';
});

dropzone.on('removeFile', function () {  });


setTimeout(function() {
    $('#comment-success').fadeOut('fast');
}, 1000); // <-- Tiempo en milisegundos (1 milisegundo equivale a un segundo)
