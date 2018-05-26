@extends('layouts.layout')
@section('style')

@endsection
@section('content')
    <section class="page-title ptb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Kontak Kami</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Kontak</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-80">
                <h2 class="section-title text-uppercase">Tetap menjaga silaturahim</h2>
                <p class="section-sub">Apa bila ada pertanyaan atau meberi saran dan kritik bisa mengirim pesan melalui form dibawah ini. Atau menghubungi ke nomer yang ada di kontak kami. Terima kasih.</p>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <form name="contact-form" id="contactForm" action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-field">
                                    <input type="text" name="name" class="validate" id="name">
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-field">
                                    <label class="sr-only" for="email">Email</label>
                                    <input id="email" type="email" name="email" class="validate">
                                    <label for="email" data-error="wrong" data-success="right">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-field">
                                    <input id="phone" type="tel" name="phone" class="validate">
                                    <label for="phone">Phone Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-field">
                                    <input id="website" type="text" name="website" class="validate">
                                    <label for="website">Your Website</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-field">
                            <textarea name="message" id="message" class="materialize-textarea"></textarea>
                            <label for="message">Message</label>
                        </div>
                        <button type="submit" name="submit" class="waves-effect waves-light btn submit-button pink mt-30 mb-sm-30">Send Message</button>
                    </form>
                </div>
                <div class="col-md-4 contact-info">

                    <div id="myMap" class="height-350"></div>

                    <address>
                        <i class="material-icons brand-color">&#xE55F;</i>
                        <div class="address">
                            <?php
                                $alamat = $kontak['alamat'];
                                $exalamat = explode(",", $alamat);
                                $c_ex = count($exalamat);
                                $alamat_ = "";
                                for($i=0;$i<$c_ex - 1;$i++){ $alamat_ .= $exalamat[$i].","; }
                                $n_alamat = $exalamat[$c_ex - 1];

                            ?>
                            <p>{{ $alamat_ }}<br>
                                {{ $n_alamat }}</p>
                        </div>
                        <i class="material-icons brand-color">&#xE61C;</i>
                        <div class="phone">
                            <p>Phone: {{ $kontak['telepon1'] }}</p>
                        </div>
                        <i class="material-icons brand-color">&#xE0E1;</i>
                        <div class="mail">
                            <p><a href="http://trendytheme.net/cdn-cgi/l/email-protection#f1d2"><span class="__cf_email__" data-cfemail="b2d4dbc0c1c69cded3c1c6f2d7cad3dfc2ded79cd1dddf">[email&#160;protected]</span></a><br>
                                <a href="#">www.yourdomain.com</a></p>
                        </div>
                    </address>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_KEY') }}"></script>
    <?php
            $longlat = $kontak['longlat'];
            $exlonglat = explode(",", $longlat);
            $long = $exlonglat[0]; $lat = $exlonglat[1];
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            //set your google maps parameters
            var $latitude = {{ $long }}, //Visit http://www.latlong.net/convert-address-to-lat-long.html for generate your Lat. Long.
                $longitude = {{ $lat }},
                $map_zoom = 16 /* ZOOM SETTING */

            //google map custom marker icon
            var $marker_url = '{{ asset('assets/img/pin.png') }}';

            //we define here the style of the map
            var style = [{
                "stylers": [{
                    "hue": "#03a9f4"
                }, {
                    "saturation": 10
                }, {
                    "gamma": 2.15
                }, {
                    "lightness": 12
                }]
            }];

            //set google map options
            var map_options = {
                center: new google.maps.LatLng($latitude, $longitude),
                zoom: $map_zoom,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                streetViewControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false,
                styles: style
            }
            //inizialize the map
            var map = new google.maps.Map(document.getElementById('myMap'), map_options);
            //add a custom marker to the map
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng($latitude, $longitude),
                map: map,
                visible: true,
                icon: $marker_url
            });

            var contentString = '<div id="mapcontent">' + '<p>Al-Magfirah, {{ $alamat }}.</p></div>';
            var infowindow = new google.maps.InfoWindow({
                maxWidth: 320,
                content: contentString
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map, marker);
            });
        });
    </script>
@endsection
