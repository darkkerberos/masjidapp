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
                        <h4 class="card-title">Tampilan Menu Sejarah</h4>
                        <form method="post" enctype="multipart/form-data" class="form-horizontal" id="formMenuSejarah">
                            <div class="row">
                                <input type="hidden" name="menusejarah_id" value="{{ $menusejarah->id }}" class="form-control"/>
                                {{--<div class="col-md-12 col-sm-12">--}}
                                    {{--<legend>Picture for Banner</legend>--}}
                                    {{--<div class="fileinput fileinput-exist text-center" data-provides="fileinput">--}}
                                        {{--<div class="fileinput-preview fileinput-exists thumbnail" id="_temp_pict_banner">--}}
                                            {{--<img src="{{ asset($menuhome['pict_banner']) }}" alt="..."--}}
                                                 {{--id="temp_pict_banner">--}}
                                            {{--<label class="col-sm-3" id="err_pict_banner">--}}
                                                {{--<code>required</code>--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<span class="btn btn-rose btn-round btn-file">--}}
                                                {{--<span class="fileinput-exists">Ganti foto</span>--}}
                                                {{--<input type="file" name="pict_banner" id="pict_banner"/>--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="col-md-12 col-sm-12">
                                    <legend>Sejarah Mesjid</legend>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <textarea class="form-control editor" id="konten_sejarah" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group label-floating is-empty center nav-align-center">
                                        <button id="updateSejarah" class="btn btn-instagram" type="button"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp; Simpan</button>

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
    <style href="{{ asset('css/colorbox.css') }}" rel="stylesheet"></style>
    <script src="{{ asset('plugins/tinymce/js/tinymce/jquery.tinymce.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/tinymce/js/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.colorbox-min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="/packages/barryvdh/elfinder/js/standalonepopup.js"></script>

    <script src="{{ asset('js/utils.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sejarah.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            demo.initMaterialWizard();
            setTimeout(function () {
                $('.card.wizard-card').addClass('active');
            }, 600);
        });
        sejarah.initSejarah("{{ route('menu_sejarah_update') }}");
        $('#modalDialog').perfectScrollbar();
        $('#modalOpenFile').perfectScrollbar();

        var editor_config = {
            height: 240,
            {{--path_absolute: "{{ route('tambahartikel') }}",--}}
            selector: "textarea.editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak preview",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern codesample",
                "fullpage toc imagetools help"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | ltr rtl | bullist numlist outdent indent removeformat formatselect| link image media | emoticons charmap | code codesample | forecolor backcolor",
            browser_spellcheck: true,
            relative_urls: false,
            remove_script_host: false,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinymce.activeEditor.windowManager.open({
                    file: '<?= route('elfinder.tinymce4') ?>',// use an absolute path!
                    title: 'File manager',
                    width: 900,
                    height: 450,
                    resizable: 'yes'
                }, {
                    setUrl: function (url) {
                        win.document.getElementById(field_name).value = url;
                    }
                });
            },
            image_advtab: true,
            style_formats: [
                {
                    title: 'Image Left',
                    selector: 'img',
                    styles: {
                        'float': 'left',
                        'margin': '0 10px 0 10px'
                    }
                },
                {
                    title: 'Image Right',
                    selector: 'img',
                    styles: {
                        'float': 'right',
                        'margin': '0 0 10px 10px'
                    }
                }
            ]
        };

        tinymce.init(editor_config);
    </script>
@endsection