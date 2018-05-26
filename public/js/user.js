var table, save_method;
var _changePassword = false;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

table = $('.tabel').DataTable({
    "processing": true,
    "serverside": true,
    "pagingType": "full_numbers",
    responsive: true,
    "ajax": {
        "url": "user/data",
        "type": "GET"
    },
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search records",
    }
});

user = {
    deleteUser: function (x, y) {
        swal({
            title: 'Anda yakin ?',
            text: 'Anda akan menghapus user <b>' + y + '</b>',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, bawel sih!',
            cancelButtonText: 'Jangan, kecian maca diapus',
            confirmButtonClass: "btn btn-success",
            cancelButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).then(function () {
            var _url = "user/delete";
            var _data = {'user': x};
            $.ajax({
                cache: false,
                type: 'post',
                url: _url,
                data: _data,
                success: function (data) {
                    var toObj = jQuery.parseJSON(data);
                    var resp = Object.keys(toObj)[0];
                    if (resp == 'success') {
                        swal({
                            title: 'Hapus!',
                            text: 'User ' + y + ' berhasil di hapus.',
                            type: 'success',
                            confirmButtonClass: "btn btn-success",
                            buttonsStyling: false
                        }).catch(swal.noop);
                        table.ajax.reload();
                    } else if (resp == 'error') {
                        swal({
                            title: 'Gagal!',
                            text: 'Jgn coba2 hek web gw, ip lu ketauan',
                            type: 'error',
                            confirmButtonClass: "btn btn-danger",
                            buttonsStyling: false
                        }).catch(swal.noop)
                    }

                }
            })
        }, function (dismiss) {
            // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            if (dismiss === 'cancel') {
                swal({
                    title: 'Ga jadi',
                    text: 'User ga jadi di hapus',
                    type: 'error',
                    confirmButtonClass: "btn btn-info",
                    buttonsStyling: false
                }).catch(swal.noop)
            }
        })
    },
    initUser: function (urlAdd, urlEdit, urlChangePassword) {

        var _flag = false;
        var _add = false;
        var _upload = false;


        $('#fieldGeneral').hide();
        $('#fieldPassword').hide();
        document.getElementById("formUser").onkeypress = function(e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 13) {
                e.preventDefault();
                $('#savechanges').click();
            }
        }

        $('#openfile_   ').on('click', function () {
            _upload = true;
        });

        $('#addUsers').on('click', function () {
            $('#resp_user').hide();
            $("#modalDialog").modal("toggle");
            $('#exampleModalLabel').html("Add User");
            _add = true;
            $('#fieldPassword').show();
            $('#fieldGeneral').show();
            $('#modalDialog').perfectScrollbar();
        });

        $('#modalDialog').on('hidden.bs.modal', function () {
            _add = false;
            _flag = false;
            _upload = false;
            _changePassword = false;
            $('#resp_user').hide();
            $('#resp_role').hide();
            $('#resp_email').hide();
            $('#resp_password').hide();
            $('#resp_password_confirm').hide();
            $("#user_name").val('');
            $("#user_role").val('');
            $("#user_password").val('');
            $("#user_password_confirm").val('');
            $("#user_email").val('');
            $("#user_id").val('');
            $('.modal').perfectScrollbar('destroy');
        })

        $('#savechanges').on('click', function (e) {
            $('#resp_user').hide();
            $('#resp_role').hide();
            $('#resp_email').hide();
            if (!e.isDefaultPrevented()) {
                var _data = new FormData($("#formUser")[0]);
                _data.append('upload', _upload);
                var _url = function () {
                    if(_add){ return urlAdd; }else if(_changePassword){ return urlChangePassword; }else{ return urlEdit; }
                }
                //console.log(_url())
                $.ajax({
                    cache: false,
                    type: 'post',
                    url: _url(),
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    data: _data,
                    success: function (data) {
                        var returndata = jQuery.parseJSON(JSON.stringify(data));
                        if (returndata.original.error != null) {
                            var _obj = returndata.original.error;
                            var _arr = Object.getOwnPropertyNames(_obj);
                            _arr.forEach(function (elem) {
                                switch (elem){
                                    case "user_name":
                                        $('#user_txt').html(_obj.user_name);
                                        $('#resp_user').show();
                                        break;
                                    case "user_email":
                                        $('#email_txt').html(_obj.user_email);
                                        $('#resp_email').show();
                                        break;
                                    case "user_role":
                                        $('#role_txt').html(_obj.user_role);
                                        $('#resp_role').show();
                                        break;
                                    case "user_password":
                                        $('#password_txt').html(_obj.user_password);
                                        $('#resp_password').show();
                                        break;
                                    case "user_password_confirm":
                                        $('#password_confirm_txt').html(_obj.user_password_confirm);
                                        $('#resp_password_confirm').show();
                                        break;
                                    default:
                                        $('#resp_user').hide();
                                        $('#resp_role').hide();
                                        $('#resp_email').hide();
                                        $('#resp_password').hide();
                                        $('#resp_password_confirm').hide();
                                        break;
                                }
                            });
                            var errmsg = utils.objToString(returndata.original.error);
                            demo.showNotification('top', 'right', 'danger', 'close', errmsg);
                        } else {
                            demo.showNotification('top', 'right', 'success', 'check', returndata.original.success);
                            $("#modalDialog").modal("toggle");
                            table.ajax.reload();
                            _flag = false;
                            _add = false;
                            _upload = false;
                        }

                        _changePassword = false;
                    },
                    error: function (err) {
                        console.log('error :' + JSON.stringify(err));
                        _add = false;
                        _changePassword = false;
                        _upload = false;
                        $('#modalDialog').modal('toggle');
                    }
                });
            }
        });

    },

    viewedit: function (x) {
        $('#fieldPassword').hide();
        var url = "user/view";
        $.ajax({
            cache: false,
            type: 'post',
            url: url,
            data: {'user': x},
            success: function (data) {
                var _p = jQuery.parseJSON(data);
                $('#user_id').val(_p.id_user);
                $("#user_name").val(_p.name);
                $("#user_email").val(_p.email);
                var $option = $('#user_role').children('option[value="'+ _p.role_id +'"]');
                $option.prop('selected', true);
                //$("option[value="+_p.role_id+"]").prop("selected",true);
                $('#exampleModalLabel').html("Edit User");
                $('#fieldGeneral').show();
                $('#fieldPassword').hide();
                $("#modalDialog").modal("toggle");
                $("#modalDialog").perfectScrollbar();
            }
        });
    },

    viewpassword: function (x) {
        var url = "user/view";
        _changePassword = true;
        $.ajax({
            cache: false,
            type: 'post',
            url: url,
            data: {'user': x},
            success: function (data) {
                var _p = jQuery.parseJSON(data);
                $('#user').val(_p.id_user);
                $('#exampleModalLabel').html("Ganti Password");
                $('#fieldGeneral').hide();
                $('#fieldPassword').show();
                $("#modalDialog").modal("toggle");
                $("#modalDialog").perfectScrollbar();
            }
        });
    }

}