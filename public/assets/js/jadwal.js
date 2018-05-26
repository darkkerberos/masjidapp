prayTimes.setMethod('MWL');
prayTimes.tune( { imsak:2, fajr: 2, dhuhr: 2, asr: 2, maghrib: 2, isha: 2} );

var hariIni = new Date();
var jmlHari = utils.daysInMonth(hariIni.getMonth(), hariIni.getFullYear());
jadwalSolat = {
    bulan: function (_id) {
        var x = 1;
        var subuh, imsak, dzuhur, ashar, magrib, isya;
        for (var i = 0; i < jmlHari; i++) {
            var options = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
            var _tgl = new Date(hariIni.getFullYear(), hariIni.getMonth(), x);
            var _date = _tgl.toLocaleDateString("id-ID", options);
            var jadwal = prayTimes.getTimes(new Date(hariIni.getFullYear(), hariIni.getMonth(), x), [-6.5971, 106.80, 265 ], +7);
            var blockHari = "style='background:lightgreen;'";
            var s = x == hariIni.getDate() ? blockHari : '';
            imsak = jadwal.imsak;
            subuh = jadwal.fajr;
            dzuhur = jadwal.dhuhr;
            ashar = jadwal.asr;
            magrib = jadwal.maghrib;
            isya = jadwal.isha;
            var isiJadwal = "<tr " + s + "><td>" + _date + "</td><td>" + imsak + "</td><td>" + subuh + "</td><td>" + dzuhur + "</td><td>" + ashar + "</td><td>" + magrib + "</td><td>" + isya + "</td></tr>";
            $(_id).append(isiJadwal);
            //console.log(x);
            x++;
        }
    },

    hariIni: function () {
        var _jadwal = prayTimes.getTimes(hariIni, [-6.595038, 106.816635, 265 ], +7);
        var Jadwal = {
            imsak: _jadwal.imsak,
            subuh: _jadwal.fajr,
            dzuhur: _jadwal.dhuhr,
            ashar: _jadwal.asr,
            magrib: _jadwal.maghrib,
            isya: _jadwal.isha
        };
        return Jadwal;
    },

    initAdzan: function () {
        var suaraAdzan = '../../assets/suara/adzan.mp3';
        var suaraAdzanSubuh = '../../assets/suara/adzan_subuh.mp3';
        var waktuSolat = this.hariIni();
        var tes = {
            subuh: '15:19',
            aa: '17:11'
        };
        var interval = null;
        function createInterval() {
            interval = setInterval(function () {
                var hours = ((new Date().getHours()).toString().length > 1) ? new Date().getHours() : '0' + new Date().getHours();
                var minutes = ((new Date().getMinutes()).toString().length > 1) ? new Date().getMinutes() : '0' + new Date().getMinutes();
                var times = hours + ':' + minutes;
                $.each(waktuSolat, function (key, val) {
                    if (val == times) {
                        $('#pengumuman').fadeIn('slow');
                        suaraAdzan = (key == 'subuh') ? suaraAdzanSubuh : suaraAdzan;
                        $('#pengumuman').append('<audio controls id="suaraAdzan" style="display: none">\n' +
                            '            <source id="audioSource" src="'+ suaraAdzan + '" type="audio/mp3">\n' +
                            '            Your browser does not support the audio element.\n' +
                            '        </audio>');
                        $('#suaraAdzan').trigger('play');
                        $('#suaraAdzan').prop('volume', 0.2);
                        $('#pengumumanText').html('<h5 style="margin-bottom:0;">Waktu adzan '+ key +' untuk daerah Bogor dan sekitarnya</h5>').marquee();
                        stopInterval();
                    }
                });
                if($('#suaraAdzan').length != 0){
                    var _adzan = document.getElementById('suaraAdzan');
                    setTimeout(function () {
                        if(_adzan.duration > 0 && !_adzan.paused){
                            var slider1 = document.getElementById('sliderRegular');
                            slider1.noUiSlider.on('update', function( values, handle ){
                                $('#suaraAdzan').prop("volume", values[handle]);
                                if(values[handle] == 0.00){
                                    $('#volAudio i').html('volume_off');
                                }else{
                                    $('#volAudio i').html('volume_up');
                                }
                            });
                            $('#volAudio').click(function () {
                                $('#suaraAdzan').prop("muted",!$('#suaraAdzan').prop("muted"));
                                if($('#suaraAdzan').prop("muted")){
                                    $('#volAudio i').html('volume_off');
                                }else{
                                    $('#volAudio i').html('volume_up');
                                }
                            })
                        }else{
                            $('#suaraAdzan').remove();
                            $('#pengumuman').hide();
                            $('#pengumumanText').marquee('destroy');
                            $('#pengumumanText').html('');
                        }
                    },1000);
                }
            }, 1000);
        }

        function stopInterval() {
            clearInterval(interval);
            setTimeout(function () {
                createInterval();
            }, 1000 * 60);
        }

        createInterval();


    }
};