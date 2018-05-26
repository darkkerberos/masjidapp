@extends('layouts.layout')
@section('content')
    <section class="page-title ptb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Jadwal waktu solat</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Jadwal</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-80">
                <h2 class="section-title text-uppercase">Jadwal Waktu Solat <b><?php echo date('F Y'); ?></b></h2>
                <p class="section-sub">Perhitungan waktu mengikuti kemendagri, dan berlaku untuk daerah Bogor dan sekitarnya.</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="" id="jadwal">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="sticky-table sticky-headers sticky-ltr-cells">
                                        <table class="table table-striped ">
                                            <thead>
                                            <tr class="sticky-row">
                                                <th class="sticky-cell">Tanggal</th>
                                                <th>Imsyak</th>
                                                <th>Subuh</th>
                                                <th>Dzuhur</th>
                                                <th>Ashar</th>
                                                <th>Maghrib</th>
                                                <th>Isya</th>
                                            </tr>
                                            </thead>
                                            <tbody id="tblJadwalSolat">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/plugin/stickyTable/jquery.stickytable.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/plugin/stickyTable/jquery.stickytable.min.css') }}"/>
    <script src="{{ asset('js/utils.js') }}"></script>
    <script src="{{ asset('assets/js/jadwal.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            jadwalSolat.bulan($('#tblJadwalSolat'));
            //$('#tblJadwaSolat').tableHeadFixer();
        });
    </script>
@endsection

