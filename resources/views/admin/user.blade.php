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
                        <h4 class="card-title">Data User</h4>
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                            <button type="button" class="btn btn-block btn-lg btn-google" id="addUsers">
                                <center><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp; Add User</center>
                            </button>
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover tabel"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>

    <!-- Modal -->
    <div class="modal fade modal-overlay" id="modalDialog" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="card">
                            <form id="formUser" class="form-horizontal" method="post" data-toggle="validator">
                                <div class="card-header card-header-text" data-background-color="rose">
                                    <h4 class="card-title">Form User</h4>
                                </div>
                                <input type="hidden" id="user_id" name="user_id">
                                <div class="card-content">
                                    <div class="row">
                                        <div id="fieldGeneral">
                                            <div class="col-md-12 col-sm-12">
                                                <legend>Username</legend>
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">Username</label>
                                                    <br/>
                                                    <input type="text" class="form-control"
                                                           value="" name="user_name" id="user_name">
                                                </div>
                                                <div id="resp_user">
                                                    <label class="col-sm-12">
                                                        <code id="user_txt"></code>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <legend>Role</legend>
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">Role</label>
                                                    <br/>
                                                    <select name="user_role" id="user_role" class="selectpicker"
                                                            data-style="btn btn-primary btn-round" title="Role User"
                                                            data-size="7">
                                                        <option disabled selected>Pilih Role</option>
                                                        @foreach($role as $list)
                                                            <option value="{{ $list->id }}">{{ $list->role_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div id="resp_role">
                                                    <label class="col-sm-12">
                                                        <code id="role_txt"></code>
                                                    </label>
                                                </div>
                                                <br/>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <legend>Foto</legend>
                                                <div class="form-group label-floating">
                                                    <div class="col-md-6">
                                                        <label for="feature_image">Foto</label>
                                                        <input type="text" readonly class="form-control" id="feature_image"
                                                               name="feature_image" value="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="" class="btn btn-fill btn-facebook popup_selector"
                                                           data-inputid="feature_image" id="openfile_">Pilih Gambar</a>
                                                    </div>
                                                </div>
                                                <br/>
                                            </div>

                                            <div class="col-md-12 col-sm-12">
                                                <legend>Email</legend>
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">Email</label>
                                                    <br/>
                                                    <input type="text" class="form-control"
                                                           value="" name="user_email" id="user_email">
                                                </div>
                                                <div id="resp_email">
                                                    <label class="col-sm-12">
                                                        <code id="email_txt"></code>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="fieldPassword">
                                            <div class="col-md-12 col-sm-12">
                                                <legend>New Password</legend>
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">New Password</label>
                                                    <br/>
                                                    <input type="password" class="form-control"
                                                           value="" name="user_password" id="user_password">
                                                </div>
                                                <div id="resp_password">
                                                    <label class="col-sm-12">
                                                        <code id="password_txt"></code>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <legend>Confirm Password</legend>
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">Confirm Password</label>
                                                    <br/>
                                                    <input type="password" class="form-control"
                                                           value="" name="user_password_confirm"
                                                           id="user_password_confirm">
                                                </div>
                                                <div id="resp_password_confirm">
                                                    <label class="col-sm-12 ">
                                                        <code id="password_confirm_txt"></code>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="savechanges">Save changes</button>
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
    <style> iframe { border:0; }</style>
    <style href="{{ asset('css/colorbox.css') }}" rel="stylesheet"></style>
    <script src="{{ asset('js/jquery.colorbox-min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="/packages/barryvdh/elfinder/js/standalonepopup.js"></script>
    <script src="{{ asset('js/utils.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/user.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#resp_user').hide();
            demo.initMaterialWizard();
            setTimeout(function () {
                $('.card.wizard-card').addClass('active');
            }, 600);

            user.initUser("{{ route('useradd') }}", "{{ route('userupdate') }}", "{{ route('userupdatepassword') }}");
        });
    </script>
    <!-- Material Dashboard javascript methods -->
@endsection