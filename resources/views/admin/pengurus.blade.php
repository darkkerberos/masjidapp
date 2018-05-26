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
                        <h4 class="card-title">Data Pengurus</h4>
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                            <button type="button" class="btn btn-block btn-lg btn-google" id="addPengurus"><center><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp; Tambah Pengurus</center></button>
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover tabel" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengurus</th>
                                    <th>Email</th>
                                    <th>Foto</th>
                                    <th>Phone</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengurus</th>
                                        <th>Email</th>
                                        <th>Foto</th>
                                        <th>Phone</th>
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
                            <form id="formEditPengurus" class="form-horizontal" method="post" data-toggle="validator" enctype="multipart/form-data">

                                <div class="card-header card-header-text" data-background-color="rose">
                                    <h4 class="card-title">Form Pengurus Mesjid</h4>
                                </div>
                                <input type="hidden" id="pengurusid" name="pengurusid">
                                <div class="card-content">
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Nama Pengurus</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input class="form-control" type="text" id="nama_pengurus"
                                                       name="namapengurus" required="true" />
                                            </div>
                                        </div>
                                       <div id="respnama">
                                            <label class="col-sm-3 label-on-right">
                                                <code id="namatxt"></code>
                                            </label>
                                       </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Email</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input class="form-control" type="email" id="email_pengurus"
                                                       name="emailpengurus" email="true" />
                                            </div>
                                        </div>
                                        <div id="respemail">
                                            <label class="col-sm-3 label-on-right">
                                                <code id="emailtxt"></code>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">No. Telp</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input class="form-control" type="text" name="phonepengurus"
                                                       id="phonepengurus" number="true" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Foto</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <span class="btn btn-round btn-rose btn-file">
                                                        <span class="fileinput-exists">Ganti Foto</span>
                                                        <input class="form-control" id="fotopengurus" type="file" name="fotopengurus" accept=".jpg, .jpeg, .png" />
                                                    </span>

                                                <div id="tempfoto">

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
@endsection

@section('scripts')
<script src="{{ asset('js/utils.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/pengurus.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#respemail').hide();
        $('#respnama').hide();
        demo.initMaterialWizard();
        setTimeout(function() {
            $('.card.wizard-card').addClass('active');
        }, 600);

        pengurus.initPengurus("{{ route('tambahpengurus') }}", "{{ route('editpengurus') }}", "{{ route('datapengurus') }}");
    });
</script>
<!-- Material Dashboard javascript methods -->

@endsection