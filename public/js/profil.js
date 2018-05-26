var table, save_method;
var _changePassword = false;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

profil = {
    initProfil: function (urlEdit, urlChangePassword) {

        var _flag = false;
        var _add = false;
        var _upload = false;
        var tmppath;
        var _imgCrop;


        $('#resp_password_confirm').hide();
        $('#resp_new_password').hide();
        $('#resp_current_password').hide();
        $('#resp_email').hide();
        $('#resp_name').hide();

        document.getElementById("formEditProfil").onkeypress = function(e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 13) {
                e.preventDefault();
                $('#savechanges').click();
            }
        }

        document.getElementById("formEditPassword").onkeypress = function(e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 13) {
                e.preventDefault();
                $('#changepassword').click();
            }
        }


        var basic = $('#main-cropper').croppie({
            viewport: { width: 400, height: 400 },
            boundary: { width: 550, height: 550 },
            showZoomer: true,

        });

        function readFile(input) {
            $('#modalCrop').modal('toggle');
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#main-cropper').croppie('bind', {
                        url: e.target.result
                    });
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#gantifoto').on('change', function () { readFile(this); });
        $('#crop').on('click', function () {
            basic.croppie('result',{
                type: 'canvas',
                size: 'viewport',
                format: 'jpeg'
            }).then(function(data) {
                console.log(data);
                $('#tmpfoto').attr('src', data);
                $('#photoProfil').attr('src', data);
                _imgCrop = data;
                _flag = true;
                $('#modalCrop').modal('toggle');
            });
        });

        $('#savechanges').on('click', function (e) {
            $('#resp_email').hide();
            $('#resp_name').hide();
            if (!e.isDefaultPrevented()) {
                var _data = new FormData($("#formEditProfil")[0]);
                _data.append('upload', _flag);
                if(_flag){ _data.append('imgCrop', _imgCrop); }
                var _url = urlEdit;
                $.ajax({
                    cache: false,
                    type: 'post',
                    url: _url,
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    data: _data,
                    success: function (data) {
                        console.log(data);
                        var returndata = jQuery.parseJSON(JSON.stringify(data));
                        if (returndata.original.error != null) {
                            var _obj = returndata.original.error;
                            var _arr = Object.getOwnPropertyNames(_obj);
                            _arr.forEach(function (elem) {
                                switch (elem){
                                    case "username":
                                        $('#name_txt').html(_obj.username);
                                        $('#resp_name').show();
                                        break;
                                    case "email":
                                        $('#email_txt').html(_obj.email);
                                        $('#resp_email').show();
                                        break;
                                    default:
                                        $('#resp_email').hide();
                                        $('#resp_name').hide();
                                        break;
                                }
                            });
                            var errmsg = utils.objToString(returndata.original.error);
                            demo.showNotification('top', 'right', 'danger', 'close', errmsg);
                        } else {
                            demo.showNotification('top', 'right', 'success', 'check', returndata.original.success);
                            _flag = false;
                            _add = false;
                            _upload = false;
                        }
                    },
                    error: function (err) {
                        console.log('error :' + JSON.stringify(err));
                    }
                });
            }
        });

        $('#changepassword').on('click', function (e) {
            $('#resp_password_confirm').hide();
            $('#resp_new_password').hide();
            $('#resp_current_password').hide();
            if (!e.isDefaultPrevented()) {
                var _data = new FormData($("#formEditPassword")[0]);
                var _url = urlChangePassword;
                $.ajax({
                    cache: false,
                    type: 'post',
                    url: _url,
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    data: _data,
                    success: function (data) {
                        var returndata = jQuery.parseJSON(JSON.stringify(data));
                        if (returndata.original.error != null) {
                            var _obj = returndata.original.error;
                            var _arr = Object.getOwnPropertyNames(_obj);
                            console.log(_arr);
                            _arr.forEach(function (elem) {
                                switch (elem){
                                    case "current_password":
                                        $('#current_password_txt').html(_obj.current_password);
                                        $('#resp_current_password').show();
                                        break;
                                    case "new_password":
                                        $('#new_password_txt').html(_obj.new_password);
                                        $('#resp_new_password').show();
                                        break;
                                    case "confirm_password":
                                        $('#password_confirm_txt').html(_obj.confirm_password);
                                        $('#resp_password_confirm').show();
                                        break;
                                    default:
                                        $('#resp_password_confirm').hide();
                                        $('#resp_new_password').hide();
                                        $('#resp_current_password').hide();
                                        break;
                                }
                            });

                            var errmsg = utils.objToString(returndata.original.error);
                            demo.showNotification('top', 'right', 'danger', 'close', errmsg);
                        } else {
                            demo.showNotification('top', 'right', 'success', 'check', returndata.original.success);
                            $("#formEditPassword")[0].reset();
                            _flag = false;
                            _add = false;
                            _upload = false;
                        }
                    },
                    error: function (err) {
                        console.log('error :' + JSON.stringify(err));
                    }
                });
            }
        });
    },
}