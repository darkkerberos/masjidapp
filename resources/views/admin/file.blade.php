@extends('adminlayouts.app')
@section('content')
    @if($data == null)
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center middle">
                    <div class="card card-plain">
                        <div class="card-content" style="min-height: calc(100vh - 355px);">
                            <h2 class="title"><i class="material-icons">warning</i> Oops tidak ada file</h2>
                            <h5 class="description">Ingin menambahkan file? </h5>
                            <button class="btn btn-facebook btn-round" data-toggle="modal" data-target="#modalDialog">
                                <i class="material-icons">file_upload</i> Upload file
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="content">
                <div class="header text-center">
                    <h3 class="title">File Manager</h3>
                    <p class="category">Handcrafted by our friend
                        {{--<a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. Please checkout the--}}
                        {{--<a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a>--}}
                    </p>
                    <button class="btn btn-facebook btn-round" data-toggle="modal" data-target="#modalDialog">
                        <i class="material-icons">file_upload</i> Upload file
                        <div class="ripple-container"></div>
                    </button>

                </div>
                <div class="row" id="">
                    @foreach($data as $lists)
                        <?php
                            $list = $lists['filename'];
                            $exData = explode('/', $list);
                            $fileName = $exData[1];
                        ?>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="card card-product" data-count="1" style="height: 240px">
                                <div class="card-image" data-header-animation="true">
                                    <a href="#">
                                        <img class="img" src="{{ asset($list) }}">
                                    </a>
                                    <div class="ripple-container"></div>
                                </div>
                                <div class="card-content">
                                    <div class="card-actions">
                                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                            <i class="material-icons">build</i> Fix Header!
                                        </button>
                                        <button type="button" class="btn btn-danger btn-simple" rel="tooltip"
                                                data-placement="bottom" title="" data-original-title="Hapus"
                                                onclick="files.deleteFiles('{{ $list }}')">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </div>
                                    <h4 class="card-title">
                                        <a href="#pablo"></a>
                                    </h4>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="stats" style="word-wrap: break-word;width: 100%;">
                                        <p class="category">{{ $fileName }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="modalDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="card">
                            <form id="formFiles" class="form-horizontal" data-toggle="validator"
                                  enctype="multipart/form-data">
                                <div class="card-header card-header-text text-center" data-background-color="purple">
                                    <h4 class="card-title">Form Files</h4>
                                </div>
                                <div class="card-content">
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <legend>Regular Image</legend>
                                        <div id="resp_files"></div>
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput"
                                             id="thumbnail_preview">
                                            <div class="thumbnail">
                                                <img src="{{ asset('img/image_placeholder.jpg') }}" alt="..."
                                                     id="img_placeholder">
                                            </div>
                                        </div>
                                        <div style="padding-top:15px;">
                                            <span class="btn btn-rose btn-round btn-file">
                                                <span class="" style="white-space: normal">Select files or image</span>
                                                    <input type="file" name="files[]" id="files"
                                                           accept="jpg,jpeg,png,bmp,pdf"
                                                           multiple="multiple"/>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="col-md-12 col-sm-12">
                                        <button type="button" class="btn btn-reddit btn-fill" data-dismiss="modal">
                                            <i class="material-icons">close</i> Close
                                        </button>
                                        <button class="btn btn-facebook btn-fill" id="uploadFiles" type="button">
                                            <i class="material-icons">file_upload</i> Upload
                                        </button>
                                    </div>
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
@endsection
@section('scripts')
    <script src="{{ asset('js/utils.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/files.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            demo.initMaterialWizard();
            setTimeout(function () {
                $('.card.wizard-card').addClass('active');
            }, 600);
        });
        files.initFiles("{{ route('uploadfiles') }}");
    </script>

@endsection