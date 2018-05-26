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
                        <h4 class="card-title">Data Role</h4>
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                            <button type="button" class="btn btn-block btn-lg btn-google" id="addRoles"><center><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp; Add Role</center></button>
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover tabel" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Role Name</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Role Name</th>
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
    <div class="modal fade" id="modalDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                            <form id="formRole" class="form-horizontal" method="post" data-toggle="validator">
                                <div class="card-header card-header-text" data-background-color="rose">
                                    <h4 class="card-title">Form Role</h4>
                                </div>
                                <input type="hidden" id="role_id" name="role_id">
                                <div class="card-content">
                                    <div class="row">
                                        <legend>Role Name</legend>
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Role Name</label>
                                            <br />
                                            <input type="text" class="form-control"
                                                   value="" name="role_name" id="role_name">
                                        </div>
                                        <div id="resp_role">
                                            <label class="col-sm-3 label-on-right">
                                                <code id="role_txt"></code>
                                            </label>
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
@endsection

@section('scripts')
    <script src="{{ asset('js/utils.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/role.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#resp_role').hide();
            demo.initMaterialWizard();
            setTimeout(function() {
                $('.card.wizard-card').addClass('active');
            }, 600);

            role.initRole("{{ route('roleadd') }}", "{{ route('roleupdate') }}");
        });
    </script>
    <!-- Material Dashboard javascript methods -->

@endsection