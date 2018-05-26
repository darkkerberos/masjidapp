var table, save_method;
var _flag = false;
var _add = false;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

sejarah = {
    initSejarah: function (urlEdit) {

        document.getElementById("formMenuSejarah").onkeypress = function(e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 13) {
                e.preventDefault();
                $('#savechanges').click();
            }
        }

        $('#resp_konten').hide();

        $('#modalDialog').on('hidden.bs.modal', function () {
            _add = false;
            _flag = false;
            $('#resp_konten').hide();
            $("#judul_sejarah").val('');
            $("#slugurl_sejarah").val('');
        })

        $('#updateSejarah').on('click', function (e) {
            if (!e.isDefaultPrevented()) {
                var _data = new FormData($("#formMenuSejarah")[0]);
                //console.log(_data);
                var konten = $(tinymce.get('konten_sejarah').getBody()).html();
                _data.append('konten_sejarah', konten);
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
                        //console.log(data);
                        var returndata = jQuery.parseJSON(JSON.stringify(data));
                        if (returndata.original.error != null) {
                            var _obj = returndata.original.error;
                            var _arr = Object.getOwnPropertyNames(_obj);
                            _arr.forEach(function (elem) {
                                switch (elem){
                                    case "kontent_sejarah":
                                        $('#err_konten').html(_obj.kontent_sejarah);
                                        $('#resp_konten').show();
                                        break;
                                    default:
                                        $('#resp_konten').hide();
                                        break;
                                }
                            });
                            var errmsg = utils.objToString(returndata.original.error);
                            demo.showNotification('top', 'right', 'danger', 'close', errmsg);
                        } else {
                            demo.showNotification('top', 'right', 'success', 'check', returndata.original.success);
                            $("#modalDialog").modal("toggle");
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
    }

}