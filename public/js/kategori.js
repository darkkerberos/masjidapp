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
        "url": "kategori/datakategori",
        "type": "GET"
    },
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search records",
    }
});

kategori = {
    deleteKategori: function (x, y) {
        swal({
            title: 'Anda yakin ?',
            text: 'Anda akan menghapus kategori <b>' + y + '</b>',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, bawel sih!',
            cancelButtonText: 'Jangan, kecian maca diapus',
            confirmButtonClass: "btn btn-success",
            cancelButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).then(function () {
            var _url = "kategori/hapus_kategori";
            var _data = {'kategori': x};
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
                            text: 'Kategori ' + y + ' berhasil di hapus.',
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
                    text: 'Kategori ga jadi di hapus',
                    type: 'error',
                    confirmButtonClass: "btn btn-info",
                    buttonsStyling: false
                }).catch(swal.noop)
            }
        })
    },
    initKategori: function (urlAdd, urlEdit) {

        var _flag = false;
        var _add = false;
        document.getElementById("formKategori").onkeypress = function(e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 13) {
                e.preventDefault();
                $('#savechanges').click();
            }
        }

        $('#addKategori').on('click', function () {
            $('#resp_kategori').hide();
            $("#modalDialog").modal("toggle");
            $('#exampleModalLabel').html("Add Kategori");
            _add = true;
            $('#fieldPassword').show();
            $('#fieldGeneral').show();
            $('#modalDialog').perfectScrollbar();
        });

        $('.modal').on('hidden.bs.modal', function () {
            _add = false;
            _flag = false;
            _changePassword = false;
            $('#resp_kategori').hide();
            $("#kategori_name").val('');
            $("#kategori_id").val('');
            $('.modal').perfectScrollbar('destroy');
        })

        $('#savechanges').on('click', function (e) {
            $('#resp_kategori').hide();
            var _url = _add ? urlAdd : urlEdit;
            console.log(_url)
            if (!e.isDefaultPrevented()) {
                var _data = new FormData($("#formKategori")[0]);
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
                            _arr.forEach(function (elem) {
                                switch (elem){
                                    case "kategori_name":
                                        $('#kategori_txt').html(_obj.kategori_name);
                                        $('#resp_kategori').show();
                                        break;
                                    default:
                                        $('#resp_kategori').hide();
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
                        }

                        _changePassword = false;
                    },
                    error: function (err) {
                        console.log('error :' + JSON.stringify(err));
                        _add = false;
                        _changePassword = false;
                        $('#modalDialog').modal('toggle');
                    }
                });
            }
        });

    },

    viewedit: function (x) {
        var url = "kategori/view_kategori";
        $.ajax({
            cache: false,
            type: 'post',
            url: url,
            data: {'kategori': x},
            success: function (data) {
                var _p = jQuery.parseJSON(data);
                $('#kategori_id').val(_p.id);
                $("#kategori_name").val(_p.nama_kategori);
                var $option = $('#kategori_role').children('option[value="'+ _p.role_id +'"]');
                $option.prop('selected', true);
                //$("option[value="+_p.role_id+"]").prop("selected",true);
                $('#exampleModalLabel').html("Edit Kategori");
                $("#modalDialog").modal("toggle");
                $("#modalDialog").perfectScrollbar();
            }
        });
    }

}