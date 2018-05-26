@extends('adminlayouts.app')
@section('content')
    <div class="container-fluid">
        <div class="content">
            <div class="header text-center">
                <h3 class="title">Artikel</h3>
                <p class="category">Buat artikel baru</p>
                <button class="btn btn-facebook btn-round" id="addArtikel">
                    <i class="material-icons">description</i> Tambah Artikel
                    <div class="ripple-container"></div>
                </button>
            </div>
            <div class="row" id="">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="purple">
                            <i class="material-icons">assignment</i>
                        </div>

                        <br>
                        <br>
                        <div class="card-content">
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover tabel"
                                       cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="width: 27%">Judul</th>
                                        <th>Penulis</th>
                                        <th>Kategori</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Kategori</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="container" style="padding-top:30px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding:10px">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="card">
                            <form id="formEditArtikel" class="form-horizontal" data-toggle="validator"
                                  enctype="multipart/form-data">
                                <div class="card-content">
                                    <div class="row">
                                        <input type="hidden" value="" name="artikelid" id="artikelid"/>
                                        <input type="hidden" value="{{ $kategori->user }}" name="user" id="user"/>
                                        <div class="col-sm-6 col-xs-12 col-md-4 ">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Judul
                                                    Artikel</label><br>
                                                <input class="form-control" type="text" name="judul_artikel"
                                                       id="judul_artikel"/>
                                            </div>
                                            <label class="col-sm-6 col-xs-12 col-md-6 label-on-right" id="resp_judul">
                                                <code id="err_judul"></code>
                                            </label>
                                        </div>
                                        <div class="col-sm-6 col-xs-12 col-md-4 ">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Slug url</label><br>
                                                <input class="form-control" type="text" name="slugurl_artikel"
                                                       id="slugurl_artikel"/>
                                            </div>
                                            <label class="col-sm-6 col-xs-12 col-md-6 label-on-right" id="resp_slugurl">
                                                <code id="err_slugurl"></code>
                                            </label>
                                        </div>
                                        <div class="col-sm-6 col-xs-12 col-md-4 ">
                                            <div class="form-group label-floating">
                                                <div class="col-md-6">
                                                    <label for="feature_image">Cover Artikel</label>
                                                    <input type="text" readonly class="form-control" id="feature_image"
                                                       name="feature_image" value="">
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="" class="btn btn-fill btn-facebook popup_selector"
                                                   data-inputid="feature_image">Pilih Gambar</a>
                                                </div>
                                            </div>
                                            <label class="label-on-right" id="resp_cover">
                                                <code id="err_cover"></code>
                                            </label>
                                        </div>
                                        <div class="col-sm-6 col-xs-12 col-md-4 ">
                                            <div class="form-group label-floating">
                                                <label for="feature_image">Deskripsi Singkat</label>
                                                <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12 col-md-4 ">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Kategori</label>
                                                <br/>
                                                <select name="kategori_artikel" id="kategori_artikel"
                                                        class="selectpicker"
                                                        data-style="btn btn-primary btn-round" title="Kategori Artikel"
                                                        data-size="7">
                                                    <option disabled selected>Pilih Kategori</option>
                                                    @foreach($kategori as $list)
                                                        <option value="{{ $list->id }}">{{ $list->nama_kategori }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="col-sm-12 col-xs-12 col-md-12 label-on-right"
                                                   id="resp_kategori">
                                                <code id="err_kategori"></code>
                                            </label>
                                        </div>
                                        <div class="col-sm-12 col-xs-12 col-md-12 ">
                                            <label class="col-sm-12 col-xs-12 col-md-12 label-on-right">Konten
                                                Artikel</label>
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                            </div>
                                            <textarea name="konten_artikel" id="konten_artikel"
                                                      class="form-control editor" rows="10"></textarea>
                                            <label class="col-sm-6 col-xs-12 col-md-6 label-on-right" id="resp_konten">
                                                <code id="err_konten"></code>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-reddit btn-block btn-fill"
                                            data-dismiss="modal"><i class="material-icons">close</i> Close
                                    </button>
                                    <button type="button" class="btn btn-facebook btn-block btn-fill" id="savechanges">
                                        <i class="material-icons">save</i> Save changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalOpenFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="container" style="padding-top:30px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Open File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <iframe width="100%" height="530px" id="iframeOpenFile"></iframe>
                    </div>
                </div>
                <div class="modal-footer">

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
    <script src="{{ asset('js/artikel.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            demo.initMaterialWizard();
            setTimeout(function () {
                $('.card.wizard-card').addClass('active');
            }, 600);
        });
        artikel.initArtikel("{{ route('tambahartikel') }}", "{{ route('editartikel') }}");
        $('#modalDialog').perfectScrollbar();
        $('#modalOpenFile').perfectScrollbar();

        var editor_config = {
            height: 240,
            {{--path_absolute: "{{ route('tambahartikel') }}",--}}
            selector: "textarea.editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
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
            }
        };

        tinymce.init(editor_config);
    </script>
    <style>
        .close:hover {
            cursor: pointer;
        }
        button.close
        {
            height: 100px;
            width: 100px;
        }
    </style>
@endsection