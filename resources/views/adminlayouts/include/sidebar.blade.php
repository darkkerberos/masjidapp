<div class="logo">
	<a href="http://www.creative-tim.com/" class="simple-text logo-mini">
		CT
	</a>
	<a href="http://www.creative-tim.com/" class="simple-text logo-normal">
		{{ config('app.name') }}
	</a>
</div>
<div class="sidebar-wrapper">
	<div class="user">
		<div class="photo" >
			{{--<div class="imageThumb" style="background-image:url('{{ asset(Auth::user()->foto) }}')"></div>--}}
			<img src="{{ asset(Auth::user()->foto) }}" class="" id="photoProfil"/>
		</div>
		<div class="info">
			<a data-toggle="collapse" href="#collapseExample" class="collapsed">
				<span>
					{{ Auth::user()->name }}
					<b class="caret"></b>
				</span>
			</a>
			<div class="clearfix"></div>
			<div class="collapse" id="collapseExample">
				<ul class="nav">
					<li>
						<a href="{{ route('profile') }}">
							<i class="material-icons">person</i>
							<span class="sidebar-normal"> My Profile </span>
						</a>
					</li>
					{{--<li>--}}
						{{--<a href="#">--}}
							{{--<span class="sidebar-mini"> EP </span>--}}
							{{--<span class="sidebar-normal"> Edit Profile </span>--}}
						{{--</a>--}}
					{{--</li>--}}
					{{--<li>--}}
						{{--<a href="#">--}}
							{{--<span class="sidebar-mini"> S </span>--}}
							{{--<span class="sidebar-normal"> Settings </span>--}}
						{{--</a>--}}
					{{--</li>--}}
				</ul>
			</div>
		</div>
	</div>
	<ul class="nav">
		<li class="{{ Route::currentRouteNamed('adminhome') ? 'active' : '' }}">
			<a href="{{ route('adminhome') }}">
				<i class="material-icons">home</i>
				<p> Home </p>
			</a>
		</li>
		<li class="{{ Route::currentRouteNamed('pengurus') ? 'active' : '' }}">
			<a href="{{ route('pengurus') }}">
				<i class="material-icons">image</i>
				<p> Pengurus

				</p>
			</a>
		</li>
        <?php
        $activeMenuHome = '';
        if(Route::currentRouteNamed('menu_home')){
            $activeMenuHome = 'active';
        }else if(Route::currentRouteNamed('admin_kontak')){
            $activeMenuHome = 'active';
        }else{
            $activeMenuHome = '';
        }

        ?>
		<li class="{{ $activeMenuHome }}">
			<?php
				$mnmenuhome = '';
				if(Route::currentRouteNamed('menu_home')){
                    $mnmenuhome = 'in';
				}else if(Route::currentRouteNamed('admin_kontak')){
                    $mnmenuhome = 'in';
				}else{
                    $mnmenuhome = '';
				}
				?>
			<a data-toggle="collapse" href="#menuMenu">
				<i class="material-icons">apps</i>
				<p> Menu
					<b class="caret"></b>
				</p>
			</a>
			<div class="collapse {{ $mnmenuhome }}" id="menuMenu">
				<ul class="nav">
					<li class="{{ Route::currentRouteNamed('menu_home') ? 'active' : '' }}">
						<a href="{{ route('menu_home') }}">
							<span class="sidebar-mini"> H </span>
							<span class="sidebar-normal"> Home </span>
						</a>
					</li>
					<li class="{{ Route::currentRouteNamed('admin_kontak') ? 'active' : '' }}">
						<a href="{{ route('admin_kontak') }}">
							<span class="sidebar-mini"> K </span>
							<span class="sidebar-normal"> Kontak </span>
						</a>
					</li>
				</ul>
			</div>
		</li>
        @if(Auth::user()->role_id == 1)
        <?php
        $activeUser = '';
        if(Route::currentRouteNamed('user')){
            $activeUser = 'active';
        }else if(Route::currentRouteNamed('role')){
            $activeUser = 'active';
        }else{
            $activeUser = '';
        }

        ?>
        <li class="{{ $activeUser }}">
            <?php
            $mnmenuuser= '';
            if(Route::currentRouteNamed('user')){
                $mnmenuuser = 'in';
            }else if(Route::currentRouteNamed('role')){
                $mnmenuuser = 'in';
            }else{
                $mnmenuuser = '';
            }
            ?>
            <a data-toggle="collapse" href="#menuUser">
                <i class="material-icons">verified_user</i>
                <p> User Management
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse {{ $mnmenuuser }}" id="menuUser">
                <ul class="nav">
                    <li class="{{ Route::currentRouteNamed('user') ? 'active' : '' }}">
                        <a href="{{ route('user') }}">
                            <i class="material-icons">account_circle</i>
                            <p> User </p>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('role') ? 'active' : '' }}">
                        <a href="{{ route('role') }}">
                            <i class="material-icons">dashboard</i>
                            <p> Role </p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
        <?php
        $activeArtikel = '';
        if(Route::currentRouteNamed('artikel')){
            $activeArtikel = 'active';
        }else if(Route::currentRouteNamed('kategori')){
            $activeArtikel = 'active';
        }else{
            $activeArtikel = '';
        }

        ?>
        <li class="{{ $activeArtikel}}">
            <?php
            $mnmenuartikel= '';
            if(Route::currentRouteNamed('artikel')){
                $mnmenuartikel = 'in';
            }else if(Route::currentRouteNamed('kategori')){
                $mnmenuartikel = 'in';
            }else{
                $mnmenuartikel = '';
            }
            ?>
            <a data-toggle="collapse" href="#menuArtikel">
                <i class="material-icons">archive</i>
                <p> Artikel Berita
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse {{ $mnmenuartikel }}" id="menuArtikel">
                <ul class="nav">
                    <li class="{{ Route::currentRouteNamed('artikel') ? 'active' : '' }}">
                        <a href="{{ route('artikel') }}">
                            <i class="material-icons">assignment</i>
                            <p> Artikel </p>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('kategori') ? 'active' : '' }}">
                        <a href="{{ route('kategori') }}">
                            <i class="material-icons">local_offer</i>
                            <p> Kategori </p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
		@if(Auth::user()->role_id == 1)
			<li class="{{ Route::currentRouteNamed('file') ? 'active' : '' }}">
				<a href="{{ route('file') }}">
					<i class="material-icons">archive</i>
					<p> File </p>
				</a>
			</li>
		@endif
		<li>
			<a href="{{ route('logout') }}"
			   onclick="event.preventDefault();
			   document.getElementById('logout-form').submit();" >
				<i class="fa fa-sign-out"></i>
				<p> Logout </p>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			</a>
		</li>
	</ul>
</div>
