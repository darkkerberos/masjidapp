var table, save_method;

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
        "url": "role/data",
        "type": "GET"
    },
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search records",
    }
});

role = {
    deleteRole: function (x, y) {
        swal({
            title: 'Anda yakin ?',
            text: 'Anda akan menghapus role <b>' + y + '</b>',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, bawel sih!',
            cancelButtonText: 'Jangan, kecian maca diapus',
            confirmButtonClass: "btn btn-success",
            cancelButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).then(function () {
            var _url = "role/delete";
            var _data = {'role': x};
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
                            text: 'Role ' + y + ' berhasil di hapus.',
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
                    text: 'Role ga jadi di hapus',
                    type: 'error',
                    confirmButtonClass: "btn btn-info",
                    buttonsStyling: false
                }).catch(swal.noop)
            }
        })
    },
    initRole: function (urlAdd, urlEdit) {

        var _flag = false;
        var _add = false;

        document.getElementById("formRole").onkeypress = function(e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 13) {
                e.preventDefault();
                $('#savechanges').click();
            }
        }

        $('#addRoles').on('click', function () {
            $('#resp_role').hide();
            $("#modalDialog").modal("toggle");
            $('#exampleModalLabel').html("Add Role");
            _add = true;
        });

        $('#modalDialog').on('hidden.bs.modal', function () {
            _add = false;
            _flag = false;
            $('#resp_role').hide();
            $("#role_name").val('');
        })

        $('#savechanges').on('click', function (e) {
            $('#resp_role').hide();
            if (!e.isDefaultPrevented()) {
                var _data = new FormData($("#formRole")[0]);
                var _url = _add ? urlAdd : urlEdit;
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
                            if (_obj.role_name != null) {
                                $('#resp_role').show();
                                $('#role_txt').html(_obj.role_name);
                            } else {

                            }
                            var errmsg = utils.objToString(returndata.original.error);
                            demo.showNotification('top', 'right', 'danger', 'close', errmsg);
                        } else {
                            demo.showNotification('top', 'right', 'success', 'check', returndata.original.success);
                            $("#modalDialog").modal("toggle");
                            table.ajax.reload();
                        }
                        _flag = false;
                        _add = false;
                    },
                    error: function (err) {
                        console.log('error :' + JSON.stringify(err));
                        _add = false;
                    }
                });
            }
        });

    },

    viewedit: function (x) {
        var url = "role/view";
        $.ajax({
            cache: false,
            type: 'post',
            url: url,
            data: {'role': x},
            success: function (data) {
                var _p = jQuery.parseJSON(data);
                $('#role_id').val(_p.id);
                $("#role_name").val(_p.role_name);
                $('#exampleModalLabel').html("Edit Role");
                $("#modalDialog").modal("toggle");
            }
        });
    }

}