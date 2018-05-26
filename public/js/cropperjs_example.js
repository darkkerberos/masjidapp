var cropper;
var input = document.getElementById('gantifoto');
var image = document.getElementById('imageCropper');
var $modal = $('#modalCrop');
var avatar = document.getElementById('tmpfoto');

$('#gantifoto').on('change', function (e) {
    var files = e.target.files;
    var done = function (url) {
        input.value = '';
        image.src = url;
        $modal.modal('show');
    };
    var reader;
    var file;
    var url;

    if (files && files.length > 0) {
        file = files[0];

        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
                done(reader.result);
            };
            reader.readAsDataURL(file);
        }
    }
});

$modal.on('shown.bs.modal', function () {
    cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 3,
    });
}).on('hidden.bs.modal', function () {
    cropper.destroy();
    cropper = null;
});

$('#crop').on('click', function () {
    var initialAvatarURL;
    var canvas;
    $modal.modal('toggle');
    if (cropper) {
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });

        initialAvatarURL = avatar.src;
        avatar.src = canvas.toDataURL();
    }

});