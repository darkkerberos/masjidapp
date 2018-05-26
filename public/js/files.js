files = {
    initFiles: function (url) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        document.getElementById("formFiles").onkeypress = function (e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 13) {
                e.preventDefault();
                $('#uploadFiles').click();
            }
        };
        $('#modalDialog').perfectScrollbar();


        $('#files').change(function (event) {
            $('#thumbnail_preview').html('');
            $('#thumbnail_preview').hide('');
            var files = event.target.files;
            var i = 0;
            $.each(files, function (k, v) {
                var tmppath = URL.createObjectURL(event.target.files[i]);
                var name = event.target.files[i].name;
                $('#thumbnail_preview').append("<div class='col-sm-6 col-md-4' style='height: 125px;padding-left: 0px;'><div class='thumbnail' style='height: inherit;overflow: unset;'><img src='" + tmppath + "' style='max-width: 100%' /><label class='label' style='color:black;padding-bottom:5px;'>" + name + "</label></div></div> ");
                i++;
            });
            $("#thumbnail_preview").fadeIn("slow");
        });

        $('#uploadFiles').on('click', function (e) {
            if (!e.isDefaultPrevented()) {
                var _data = new FormData($("#formFiles")[0]);
                $.ajax({
                    cache: false,
                    data: _data,
                    xhr: function () {
                        var myXhr = $.ajaxSettings.xhr();
                        myXhr.upload.onprogress = function (ev) {
                            if (ev.lengthComputable) {
                                var percentComplete = parseInt((ev.loaded / ev.total) * 100);
                                swal({
                                    title: 'Sebentar, ngopi dulu',
                                    html: '<div class="progress progress-line-info">' +
                                    '<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="' + percentComplete + '" aria-valuemin="0" aria-valuemax="100" style="width: ' + percentComplete + '%;">' +
                                    '<span class="sr-only">' + percentComplete + ' Complete</span></div></div>',
                                    showCancelButton: true,
                                    confirmButtonClass: 'btn btn-success',
                                    cancelButtonClass: 'btn btn-danger',
                                    buttonsStyling: false
                                }).catch(swal.noop);
                                if (percentComplete === 100) {
                                    swal.close();
                                }
                            }
                        };
                        // if(myXhr.upload){
                        //     myXhr.upload.addEventListener('progress',progress, false);
                        // }
                        return myXhr;
                    },
                    type: 'post',
                    url: url,
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        var arrData = data;
                        $.each(arrData, function (k, val) {
                            //console.log(k + ' : ' + val);
                            if (val.error != null) {
                                var errmsg = val.error;
                                demo.showNotification('top', 'right', 'danger', 'close', errmsg);
                            } else {
                                var successmsg = val.success;
                                demo.showNotification('top', 'right', 'success', 'check', successmsg);
                                $('#modalDialog').modal('toggle');
                                setTimeout(function () {
                                    location.reload();
                                }, 500);
                            }
                        });
                    },
                    error: function (err) {
                        var response = JSON.stringify(err.responseText);
                        utils.createWindow(response);
                    }
                });
            }

            function progress(e) {

                if (e.lengthComputable) {
                    var max = e.total;
                    var current = e.loaded;

                    var Percentage = (current * 100) / max;
                    console.log(Percentage);


                    if (Percentage >= 100) {
                        // process completed
                    }
                }
            }

        });
    },

    deleteFiles: function (x) {
        swal({
            title: 'Anda yakin ?',
            text: 'Anda akan menghapus file <b>' + x + '</b>',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, apus aja!',
            cancelButtonText: 'Jangan diapus',
            confirmButtonClass: "btn btn-success",
            cancelButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).then(function () {
            var _data = new FormData();
            var url = 'file/deletefiles';
            _data.append('fileName', x);
            $.ajax({
                cache: false,
                data: _data,
                type: 'post',
                url: url,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.error != null) {
                        var errmsg = data.error;
                        demo.showNotification('top', 'right', 'danger', 'close', errmsg);
                    } else {
                        var successmsg = data.success;
                        demo.showNotification('top', 'right', 'success', 'check', successmsg);
                        setTimeout(function () {
                            location.reload();
                        }, 500);
                    }
                }
            });
        }, function (dismiss) {
            // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            if (dismiss === 'cancel') {
                swal({
                    title: 'Ga jadi',
                    text: 'Filr ga jadi di hapus',
                    type: 'error',
                    confirmButtonClass: "btn btn-info",
                    buttonsStyling: false
                }).catch(swal.noop)
            }
        })

    }
}