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
        "url": "datapengurus",
        "type": "GET"
    },
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search records",
    }
});


pengurus = {
    deletePengurus: function (x, y) {
        swal({
            title: 'Anda yakin ?',
            text: 'Anda akan menghapus pengurus <b>' + y + '</b>',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, bawel sih!',
            cancelButtonText: 'Jangan, kecian maca diapus',
            confirmButtonClass: "btn btn-success",
            cancelButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).then(function () {
            var _url = "hapus_pengurus";
            var _data = {'pengurus': x};
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
                            text: 'Pengurus ' + y + ' berhasil di hapus.',
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
                    text: 'Pengurus ga jadi di hapus',
                    type: 'error',
                    confirmButtonClass: "btn btn-info",
                    buttonsStyling: false
                }).catch(swal.noop)
            }
        })
    },
    initPengurus: function (urlAdd, urlEdit, urlDataTable) {

        document.getElementById("formEditPengurus").onkeypress = function(e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 13) {
                e.preventDefault();
                $('#savechanges').click();
            }
        }

        var _flag = false;
        $('#fotopengurus').change(function (event) {
            $('#_tmpfoto').remove();
            var tmppath = URL.createObjectURL(event.target.files[0]);
            $('#tempfoto').append("<img id='_tmpfoto' src='' style='max-width:100px' />");
            $("#tempfoto").fadeIn("slow");
            $('#_tmpfoto').attr('src', tmppath);
            _flag = true;
        });

        var _add = false;

        $('#addPengurus').on('click', function () {
            $('#respemail').hide();
            $('#respnama').hide();
            $("#modalDialog").modal("toggle");
            $('#exampleModalLabel').html("Tambah Pengurus");
            _add = true;
        });

        $('#modalDialog').on('hidden.bs.modal', function () {
            _add = false;
            _flag = false;
            $('#respemail').hide();
            $('#respnama').hide();
            $("#nama_pengurus").val('');
            $("#email_pengurus").val('');
        })

        $('#savechanges').on('click', function (e) {
            $('#respemail').hide();
            $('#respnama').hide();
            if (!e.isDefaultPrevented()) {
                var _data = new FormData($("#formEditPengurus")[0]);
                _data.append('upload', _flag);
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
                            if (_obj.email != null && _obj.nama_pengurus != null) {
                                $('#respnama').show();
                                $('#namatxt').html(_obj.nama_pengurus);
                                $('#respemail').show();
                                $('#emailtxt').html(_obj.email);
                            } else if (_obj.email != null) {
                                $('#respemail').show();
                                $('#emailtxt').html(_obj.email);
                            } else if (_obj.nama_pengurus != null) {
                                $('#respnama').show();
                                $('#namatxt').html(_obj.nama_pengurus);

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
        var url = "view_edit_pengurus";
        $.ajax({
            cache: false,
            type: 'post',
            url: url,
            data: {'pengurus': x},
            success: function (data) {
                $("#_tmpfoto").remove();
                var _p = jQuery.parseJSON(data);
                $('#pengurusid').val(_p.id_pengurus);
                $("#nama_pengurus").val(_p.nama_pengurus);
                $("#email_pengurus").val(_p.email);
                $("#tempfoto").append("<img id='_tmpfoto' src='" + _p.foto + "' style='max-width:100px'>");
                //$("#modalDialog").modal("show");
                $('#exampleModalLabel').html("Edit Pengurus");
                $("#modalDialog").modal("toggle");
            }
        });
    }

}