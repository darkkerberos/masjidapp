var table, save_method;
var _flag = false;
var _add = false;
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
        "url": "artikel/dataartikel",
        "type": "GET"
    },
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search records",
    }
});


artikel = {
    deleteArtikel: function (x, y) {
        swal({
            title: 'Anda yakin ?',
            text: 'Anda akan menghapus artikel <b>' + y + '</b>',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus saja!',
            cancelButtonText: 'Jangan, ga jadi.',
            confirmButtonClass: "btn btn-success",
            cancelButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).then(function () {
            var _url = "artikel/hapus_artikel";
            var _data = {'artikel': x};
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
                            text: 'Artikel ' + y + ' berhasil di hapus.',
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
                    text: 'Artikel ga jadi di hapus',
                    type: 'error',
                    confirmButtonClass: "btn btn-info",
                    buttonsStyling: false
                }).catch(swal.noop)
            }
        })
    },
    initArtikel: function (urlAdd, urlEdit) {

        document.getElementById("formEditArtikel").onkeypress = function(e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 13) {
                e.preventDefault();
                $('#savechanges').click();
            }
        }

        document.getElementById("judul_artikel").onkeydown = function(e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 9) {
                var judul = this.value;
                var desired = judul.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, ' ');
                //console.log('desire : ' + desired);
                var slug = desired.replace(/\s/g, "-");
                //console.log('slug: ' + slug);
                $('#slugurl_artikel').val(slug.toLowerCase());
                //console.log('lowercase: ' + slug.toLowerCase());
            }
        }

        $('#resp_konten').hide();
        $('#resp_slugurl').hide();
        $('#resp_judul').hide();
        $('#resp_kategori').hide();
        $('#resp_cover').hide();


        $('#addArtikel').on('click', function () {
            $('#resp_konten').hide();
            $('#resp_slugurl').hide();
            $('#resp_judul').hide();
            $('#resp_kategori').hide();
            $('#resp_cover').hide();
            $("#modalDialog").modal("toggle");
            $('#exampleModalLabel').html("Tambah Artikel");
            _add = true;
        });

        $('#modalDialog').on('hidden.bs.modal', function () {
            _add = false;
            _flag = false;
            $('#resp_konten').hide();
            $('#resp_slugurl').hide();
            $('#resp_judul').hide();
            $('#resp_kategori').hide();
            $('#resp_cover').hide();
            $("#judul_artikel").val('');
            $("#slugurl_artikel").val('');
        })

        $('#savechanges').on('click', function (e) {
            $('#resp_konten').hide();
            $('#resp_slugurl').hide();
            $('#resp_judul').hide();
            $('#resp_kategori').hide();
            $('#resp_cover').hide();
            if (!e.isDefaultPrevented()) {
                var _data = new FormData($("#formEditArtikel")[0]);
                var konten = $(tinymce.get('konten_artikel').getBody()).html();
                _data.append('konten_artikel', konten);
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
                            var _arr = Object.getOwnPropertyNames(_obj);
                            _arr.forEach(function (elem) {
                                switch (elem){
                                    case "judul_artikel":
                                        $('#err_judul').html(_obj.judul_artikel);
                                        $('#resp_judul').show();
                                        break;
                                    case "slugurl_artikel":
                                        $('#err_slugurl').html(_obj.slugurl_artikel);
                                        $('#resp_slugurl').show();
                                        break;
                                    case "kategori_artikel":
                                        $('#err_kategori').html(_obj.kategori_artikel);
                                        $('#resp_kategori').show();
                                        break;
                                    case "konten_artikel":
                                        $('#err_konten').html(_obj.konten_artikel);
                                        $('#resp_konten').show();
                                        break;
                                    case "feature_image":
                                        $('#err_cover').html(_obj.feature_image);
                                        $('#resp_cover').show();
                                        break;
                                    default:
                                        $('#resp_judul').hide();
                                        $('#resp_slugurl').hide();
                                        $('#resp_kategori').hide();
                                        $('#resp_konten').hide();
                                        $('#resp_cover').hide();
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

                    },
                    error: function (err) {
                        console.log(err.responseText);
                        $('#modalDialog').modal('toggle');
                    }
                });
            }
        });

    },

    viewedit: function (x) {
        var url = "artikel/view_artikel";
        $.ajax({
            cache: false,
            type: 'post',
            url: url,
            data: {'artikel': x},
            success: function (data) {
                var _p = jQuery.parseJSON(data);
                $('#artikelid').val(_p.id);
                $("#judul_artikel").val(_p.judul_artikel);
                $("#slugurl_artikel").val(_p.slug_url);
                $("#feature_image").val(_p.cover_bg);
                $("#deskripsi").val(_p.deskripsi_singkat);
                $("#user").val(_p.user.id_user);
                var $option = $('#kategori_artikel').children('option[value="'+ _p.kategori_id +'"]');
                $option.prop('selected', true);
                $(tinymce.get('konten_artikel').getBody()).html(_p.konten);
                $('#exampleModalLabel').html("Edit Artikel");
                $("#modalDialog").modal("toggle");
                _add = false;
            }
        });
    }

}