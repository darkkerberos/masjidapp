<header id="header" class="tt-nav {{ Route::currentRouteNamed('home') ? 'transparent-header' : 'nav-border-bottom' }}">
    <div class="header-sticky light-header">
        <div class="container">
            <div class="search-wrapper">
                <div class="search-trigger light pull-right">
                    <div class='search-btn'></div>
                    <i class="material-icons">&#xE8B6;</i>
                </div>

                <i class="search-close material-icons">&#xE5CD;</i>
                <div class="search-form-wrapper">
                    <form action="#" class="white-form">
                        <div class="input-field">
                            <input type="text" name="search" id="search">
                            <label for="search" class="">Search Here...</label>
                        </div>
                        <button class="btn pink search-button waves-effect waves-light" type="submit"><i
                                    class="material-icons">&#xE8B6;</i></button>
                    </form>
                </div>
            </div>
            <div id="materialize-menu" class="menuzord">

                <a href="{{ route('home') }}" class="logo-brand">
                    {{--<img class="logo-dark" src="{{ asset('assets/img/logo.png') }}" alt="" />--}}
                    <img class="retina" src="{{ asset('assets/img/almagfirah.png') }}" alt=""/>
                </a>


                <ul class="menuzord-menu pull-right">
                    <li class="{{ RouteHelp::isActiveRoute('home') }}">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="{{ RouteHelp::isActiveRoute('jadwal') }}">
                        <a href="{{ route('jadwal') }}">Jadwal Solat</a>
                    </li>
                    <li class="{{ RouteHelp::areActiveRoutes(['home_artikel','home_artikel_kategori', 'home_artikel_kategori_details']) }}">
                        <a href="javascript:void(0)">Artikel</a>
                        <ul class="dropdown">
                            <?php $kategori = KategoriHelp::getDataKategori(); ?>
                            @foreach($kategori as $kat)
                                <?php $str = strtolower(str_replace(" ", "-", $kat->nama_kategori)); ?>
                                <li>
                                    <a href="{{ route("home_artikel_kategori", ['kategori' => $str]) }}">{{ $kat->nama_kategori }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="{{ RouteHelp::isActiveRoute('kontak') }}">
                        <a href="{{ route('kontak') }}">Kontak</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="col-md-12" id="pengumuman" style="position: initial;background-color: #d6e0e4;display: none;" >
        <div class="col-md-6">
            <div class="col-md-1">
                <a style="color:#333" id="volAudio">
                    <i class="material-icons" style="vertical-align:middle">volume_up</i>
                </a>
            </div>
            <div class="col-md-3" style="margin-top: 15px;">
                <div id="sliderRegular" class="slider"></div>
            </div>
            <div class="col-md-4" style="margin-top: 10px;overflow:hidden" id="pengumumanText"></div>
        </div>
    </div>
</header>