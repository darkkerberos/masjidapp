@extends('adminlayouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-profile">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">perm_identity</i>
                            <h4 class="card-title">Edit Profile </h4>
                        </div>
                        <div class="card-avatar" style="max-width:250px;max-height: 250px;border-radius: 0;">
                            <a href="#pablo">
                                <img class="img" id='tmpfoto' src="{{ asset($profil->foto) }}" id="foto_user"/>
                            </a>
                        </div>
                        <div class="card-content">
                            <form id="formEditProfil" name="formEditProfil" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6" style="text-align: left">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Username</label>
                                            <input type="text" name="username" class="form-control"
                                                   value="{{ $profil->name }}">
                                        </div>
                                        <div id="resp_name">
                                            <label class="col-sm-12 ">
                                                <code id="name_txt"></code>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="text-align: left">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email address</label>
                                            <input type="email" name="email" class="form-control"
                                                   value="{{ $profil->email }}">
                                        </div>
                                        <div id="resp_email">
                                            <label class="col-sm-12 ">
                                                <code id="email_txt"></code>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating" style="text-align: left">
                                            <label class="control-label">Role</label>
                                            <input type="text" class="form-control"
                                                   value="{{ $profil->role->role_name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating ">
                                            <div class="col-md-8" style="text-align: left">
                                                <label for="feature_image">Foto</label>
                                                <input type="text" readonly class="form-control" id="fotoUrl"
                                                       value="{{ $profil->foto }}">
                                            </div>
                                            <div class="col-md-4">
                                                <span class="btn btn-round btn-instagram">
                                                    <i class="material-icons">camera</i>
                                                        <span class="">Ganti Foto</span>
                                                        <input type="file" capture="camera" id='gantifoto'
                                                               name='gantifoto'>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-facebook " id="savechanges"><i
                                                    class="material-icons">save</i> Update Profile
                                        </button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-profile">
                        <div class="card-header card-header-icon" data-background-color="orange">
                            <i class="material-icons">lock</i>
                            <h4 class="card-title">Change Password </h4>
                        </div>
                        <div class="clearfix"></div>
                        <div class="card-content">
                            <form id="formEditPassword" name="formEditPassword">
                                <div class="row">
                                    <div class="col-md-12" style="text-align: left">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Current Password</label>
                                            <input type="password" name="current_password" class="form-control"
                                                   value="" id="current_password">
                                        </div>
                                        <div id="resp_current_password">
                                            <label class="col-sm-12 ">
                                                <code id="current_password_txt"></code>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="text-align: left">
                                        <div class="form-group label-floating">
                                            <label class="control-label">New Password</label>
                                            <input type="password" name="new_password" class="form-control"
                                                   value="">
                                        </div>
                                        <div id="resp_new_password">
                                            <label class="col-sm-12 ">
                                                <code id="new_password_txt"></code>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="text-align: left">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control"
                                                   value="">
                                        </div>
                                        <div id="resp_password_confirm">
                                            <label class="col-sm-12 ">
                                                <code id="password_confirm_txt"></code>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-instagram " id="changepassword"><i
                                                    class="material-icons">save</i> Change Password
                                        </button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                {{--<div class="col-md-4">--}}
                {{--<div class="card card-profile">--}}
                {{--<div class="card-avatar">--}}
                {{--<a href="#pablo">--}}
                {{--<img class="img" src="{{ asset(Auth::user()->foto) }}" />--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--<div class="card-content">--}}
                {{--<h6 class="category text-gray">CEO / Co-Founder</h6>--}}
                {{--<h4 class="card-title">Alec Thompson</h4>--}}
                {{--<p class="description">--}}
                {{--Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...--}}
                {{--</p>--}}
                {{--<a href="#pablo" class="btn btn-rose btn-round">Follow</a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
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
                    <div class="col-md-12" style="height:500px;
    width:400px;">
                        <div id="_tmpfoto" style=""></div>
                        {{--<iframe width="100%" height="530px" id="iframeOpenFile"></iframe>--}}
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- modal crop -->
    <div class="modal fade" id="modalCrop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Crop the image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--<div class="img-container">--}}
                    {{--<img id="imageCropper" src="" class="img imgCrop">--}}
                    {{--</div>--}}
                    <div id="main-cropper"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <style>
        .form-group.label-static label.control-label, .form-group.label-placeholder label.control-label, .form-group.label-floating label.control-label {
            position: relative;
        }

        .imgCrop {
            width: 100%;
        }

        iframe {
            border: 0;
        }

        .img-container img {
            max-width: 100%;
        }

        /*#photoContainer {*/
        /*z-index:100;*/
        /*height:500px;*/
        /*width:400px;*/
        /*background: white;*/
        /*border: 1px solid #ccc;*/
        /*-moz-box-shadow: 0 0 3px #ccc;*/
        /*-webkit-box-shadow: 0 0 3px #ccc;*/
        /*box-shadow: 0 0 3px #ccc;*/
        /*text-align: center;*/
        /*}*/
    </style>

    {{--<script src="{{ asset('plugins/cropperjs/dist/cropper.js') }}" type="text/javascript"></script>--}}
    <script src="{{ asset('plugins/croppie-2.6.2/croppie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/utils.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/profil.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            demo.initMaterialWizard();
            setTimeout(function () {
                $('.card.wizard-card').addClass('active');
            }, 600);
        });
        $('#modalCrop').perfectScrollbar();

        profil.initProfil("{{ route('updateprofile') }}", "{{ route('changepassword') }}");
    </script>

@endsection