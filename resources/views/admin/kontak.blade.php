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
                        <h4 class="card-title">Kontak</h4>
                        <form method="post" class="form-horizontal" id="formKontak">
                            <input type="hidden" name="kontak_id" value="{{ $kontak['id'] }}" class="form-control"/>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <legend>Alamat</legend>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <textarea name="alamat" class="form-control" placeholder="Alamat...">{{ $kontak['alamat'] }}</textarea>
                                        <label class="" id="err_alamat">
                                            <code id="resp_alamat"></code>
                                        </label>
                                    </div>
                                    <br />
                                    <br />
                                    <legend>Email</legend>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" placeholder="Email..." type="email"
                                               value="{{ $kontak['email'] }}" name="email">
                                        <label class="" id="err_email">
                                            <code id="resp_email"></code>
                                        </label>
                                    </div>
                                    <br />
                                    <br />
                                    <legend>Telepon 1</legend>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control" placeholder="Telepon 1..." type="text"
                                               value="{{ $kontak['email'] }}" name="telepon1">
                                        <label class="" id="err_telepon1">
                                            <code id="resp_telepon1"></code>
                                        </label>
                                    </div>
                                    <br />
                                    <br />
                                    <legend>Telepon 2</legend>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control" placeholder="Telepon 2..." type="text"
                                               value="{{ $kontak['email'] }}" name="telepon2">
                                        <label class="" id="err_telepon2">
                                            <code id="resp_telepon2"></code>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <legend>LongLat (Koordinat Peta)</legend>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Ex: -6.532039, 106.825812 (format longitude,latitude)</label>
                                        <br />
                                        <input type="text" class="form-control"
                                               value="{{ $kontak['longlat'] }}" name="longlat">
                                        <label class="" id="err_longlat">
                                            <code id="resp_longlat"></code>
                                        </label>
                                    </div>
                                    <br />
                                    <br />
                                    <legend>Facebook Link</legend>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Ex: https://www.facebook.com/rockstar.ropala (jika ada)</label>
                                        <br />
                                        <input type="text" class="form-control"
                                               value="{{ $kontak['fb_link'] }}" name="fb_link">
                                        <label class="" id="err_fb_link">
                                            <code id="resp_fb_link"></code>
                                        </label>
                                    </div>
                                    <br />
                                    <br />
                                    <legend>Twitter Link</legend>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Ex: https://www.twitter.com/rockstar_ropala (jika ada)</label>
                                        <br />
                                        <input type="text" class="form-control"
                                               value="{{ $kontak['twitter_link'] }}" name="twitter_link">
                                        <label class="" id="err_twitter_link">
                                            <code id="resp_twitter_link"></code>
                                        </label>
                                    </div>
                                    <br />
                                    <br />
                                    <legend>Instagram Link</legend>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Ex: https://www.instagram.com/___dk05 (jika ada)</label>
                                        <br />
                                        <input type="text" class="form-control"
                                               value="{{ $kontak['instagram_link'] }}" name="instagram_link">
                                        <label class="" id="err_instagram_link">
                                            <code id="resp_instagram_link"></code>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group label-floating is-empty center nav-align-center">
                                        <button id="updateKontak" class="btn btn-instagram" type="button"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp; Simpan</button>

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
    <script src="{{ asset('js/kontak.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            demo.initMaterialWizard();
            setTimeout(function() {
                $('.card.wizard-card').addClass('active');
            }, 600);

            kontak.initKontak("{{ route("admin_kontak_update") }}");
        });
    </script>

@endsection