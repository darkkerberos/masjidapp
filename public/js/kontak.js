kontak = {
    initKontak: function (url) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        document.getElementById("formKontak").onkeypress = function(e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 13) {
                e.preventDefault();
                $('#savechanges').click();
            }
        }

        $('#err_alamat').hide();
        $('#err_email').hide();
        $('#err_telepon1').hide();
        $('#err_telepon2').hide();
        $('#err_longlat').hide();
        $('#err_fb_link').hide();
        $('#err_twitter_link').hide();
        $('#err_instagram_link').hide();

        $('#updateKontak').on('click', function (e) {
            e.defaultPrevented;
            $('#err_alamat').hide();
            $('#err_email').hide();
            $('#err_telepon1').hide();
            $('#err_telepon2').hide();
            $('#err_longlat').hide();
            $('#err_fb_link').hide();
            $('#err_twitter_link').hide();
            $('#err_instagram_link').hide();
            if(!e.isDefaultPrevented()) {
                var _data = new FormData($("#formKontak")[0]);
                $.ajax({
                    cache: false,
                    type: 'post',
                    url: url,
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    data: _data,
                    success: function (data) {
                        var returndata = jQuery.parseJSON(JSON.stringify(data));
                        if(returndata.original.error != null){
                            var _obj = returndata.original.error;
                            var _arr = Object.getOwnPropertyNames(_obj);
                            //console.log(Object.getOwnPropertyNames(_obj))
                            _arr.forEach(function (elem) {
                                switch (elem){
                                    case "alamat":
                                        $('#resp_alamat').html(_obj.alamat);
                                        $('#err_alamat').show();
                                        break;
                                    case "email":
                                        $('#resp_email').html(_obj.email);
                                        $('#err_email').show();
                                        break;
                                    case "telepon1":
                                        $('#resp_telepon1').html(_obj.telepon1);
                                        $('#err_telepon1').show();
                                        break;
                                    case "telepon2":
                                        $('#resp_telepon2').html(_obj.telepon2);
                                        $('#err_telepon2').show();
                                        break;
                                    case "longlat":
                                        $('#resp_longlat').html(_obj.longlat);
                                        $('#err_longlat').show();
                                        break;
                                    case "fb_link":
                                        $('#resp_fb_link').html(_obj.fb_link);
                                        $('#err_fb_link').show();
                                        break;
                                    case "twitter_link":
                                        $('#resp_twitter_link').html(_obj.twitter_link);
                                        $('#err_twitter_link').show();
                                        break;
                                    case "instagram_link":
                                        $('#resp_instagram_link').html(_obj.instagram_link);
                                        $('#err_instagram_link').show();
                                        break;
                                    default:
                                        break;
                                }
                            });
                            var errmsg = utils.objToString(returndata.original.error);
                            demo.showNotification('top', 'right', 'danger', 'close', errmsg);
                        }else{
                            demo.showNotification('top', 'right','success', 'check', returndata.success);
                        }
                    },
                    error: function (err) {
                        console.log('error :' + JSON.stringify(err));
                    }
                });
            }

        });
    }
};