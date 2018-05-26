@extends('adminlayouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Tampilan Menu Home</h4>
                        <form method="post" enctype="multipart/form-data" class="form-horizontal" id="formMenuhome">
                            <input type="hidden" name="menuhome_id" value="{{ $menuhome['id'] }}" class="form-control"/>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <legend>Picture for Banner</legend>
                                    <div class="fileinput fileinput-exist text-center" data-provides="fileinput">
                                        <div class="fileinput-preview fileinput-exists thumbnail" id="_temp_pict_banner">
                                            <img src="{{ asset($menuhome['pict_banner']) }}" alt="..."
                                                 id="temp_pict_banner">
                                            <label class="col-sm-3" id="err_pict_banner">
                                                <code>required</code>
                                            </label>
                                        </div>
                                        <div>
                                            <span class="btn btn-rose btn-round btn-file">
                                                <span class="fileinput-exists">Ganti foto</span>
                                                <input type="file" name="pict_banner" id="pict_banner"/>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <legend>Title Banner</legend>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control" placeholder="Title Banner"
                                               value="{{ $menuhome['title_banner'] }}" name="title_banner">
                                        <label class="" id="err_title_banner">
                                            <code id="resp_title_banner"></code>
                                        </label>
                                    </div>
                                    <br />
                                    <br />
                                    <legend>Description Title</legend>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control" placeholder="Description Title"
                                               value="{{ $menuhome['desc_title'] }}" name="desc_title">
                                        <label class="" id="err_desc_title">
                                            <code id="resp_desc_title"></code>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group label-floating is-empty center nav-align-center">
                                        <button id="updateHome" class="btn btn-instagram" type="button"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp; Simpan</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/utils.js') }}" type="text/javascript"></script>
    <script>
        menuHome = {
            initMenuHome: function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#err_desc_title').hide();
                $('#err_pict_banner').hide();
                $('#err_title_banner').hide();

                $('#pict_banner').on('change', function (event) {
                    $('#temp_pict_banner').remove();
                    var tmppath = URL.createObjectURL(event.target.files[0]);
                    $('#_temp_pict_banner').append("<img id='temp_pict_banner' src='' />");
                    $("#temp_pict_banner").fadeIn("slow");
                    $('#_temp_pict_banner').attr('src',tmppath);
                    _flag = true;
                });

                var _flag = false;
                $('#updateHome').on('click', function (e) {
                    e.defaultPrevented;
                    $('#err_desc_title').hide();
                    $('#err_pict_banner').hide();
                    $('#err_title_banner').hide();
                    if(!e.isDefaultPrevented()) {
                        var url = "{{ route('menu_home_update') }}";
                        var _data = new FormData($("#formMenuhome")[0]);
                        _data.append('upload', _flag);
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
                                //console.log(data);
                                //console.log(JSON.stringify(returndata));
                                //
                                if(returndata.error != null){
                                    var _obj = returndata.error;
                                    if(_obj.title_banner != null && _obj.desc_title != null) {
                                        $('#err_desc_title').show();
                                        $('#err_title_banner').show();
                                        $('#resp_title_banner').html(_obj.title_banner);
                                        $('#resp_desc_title').html(_obj.desc_title);
                                    } else if(_obj.title_banner != null){
                                        $('#err_title_banner').show();
                                        $('#resp_title_banner').html(_obj.title_banner);
                                    }else if(_obj.desc_title != null){
                                        $('#err_desc_title').show();
                                        $('#resp_desc_title').html(_obj.desc_title);

                                    }else {

                                    }
                                    //console.log(_obj);
                                    var errmsg = utils.objToString(returndata.error);
                                    demo.showNotification('top', 'right', 'danger', 'close', errmsg);
                                }else{
                                    demo.showNotification('top', 'right','success', 'check', returndata.success);
                                }
                                _flag = false;
                            },
                            error: function (err) {
                                console.log('error :' + JSON.stringify(err));
                                _flag = false;
                            }
                        });
                    }

                });
            }
        };
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            demo.initMaterialWizard();
            setTimeout(function() {
                $('.card.wizard-card').addClass('active');
            }, 600);

            menuHome.initMenuHome();
        });
    </script>

@endsection