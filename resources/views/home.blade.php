@extends('layouts.layout')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/revolution/css/settings.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/revolution/css/navigation.css') }}">
@endsection
@section('content')
    {{--<section class="banner-4 parallax-bg bg-fixed overlay dark-5 fullscreen-banner valign-wrapper" >--}}
    {{--<div class="valign-cell">--}}
    {{--<div class="container padding-top-110">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-6">--}}
    {{--<h1 class="intro-title text-uppercase white-text mb-30">--}}
    {{--{{ $menuhome['title_banner'] }}--}}
    {{--</h1>--}}
    {{--<p class="lead text-regular white-text">{{ $menuhome['desc_title'] }}</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    <section class="rev_slider_wrapper ">
        <div class="materialize-parallax rev_slider " data-version="5.0">
            <ul>
                <li data-transition="fade" data-slotamount="default" data-easein="Power3.easeInOut"
                    data-easeout="Power3.easeInOut" data-masterspeed="1500"
                    data-thumb="{{ asset($menuhome['pict_banner']) }}" data-rotate="0" data-saveperformance="off"
                    data-title="Parallax" data-description="">

                    <img src="{{ asset($menuhome['pict_banner']) }}" alt="" data-bgposition="center center"
                         data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg "
                         data-no-retina>


                    <div class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-3"
                         data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                         data-fontsize="['70','70','70','45']" data-lineheight="['70','70','70','50']" data-width="none"
                         data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;"
                         data-transform_in="y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;"
                         data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                         data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                         data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1000" data-splitin="chars"
                         data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05"
                         style="z-index: 5; white-space: nowrap; padding-left:10px;">{{ $menuhome['title_banner'] }}
                    </div>

                    <div class="tp-caption rev-subheading white-text tp-resizeme rs-parallaxlevel-2"
                         data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['70','70','70','70']"
                         data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;"
                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                         data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                         data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                         data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1500" data-splitin="none"
                         data-splitout="none" data-responsive_offset="on"
                         style="z-index: 6; white-space: nowrap;padding-left:10px;">{{ $menuhome['desc_title'] }}
                    </div>

                    <div class="tp-caption NotGeneric-Icon tp-resizeme rs-parallaxlevel-1"
                         data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-68','-68']"
                         data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;"
                         data-style_hover="cursor:default;"
                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;"
                         data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                         data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                         data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="2000" data-splitin="none"
                         data-splitout="none" data-responsive_offset="on" style="z-index: 7; white-space: nowrap;">
                    </div>

                    <div class="tp-caption tp-resizeme rev-btn  rs-parallaxlevel-0"
                         data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['150','150','150','150']"
                         data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;"
                         data-style_hover="cursor:default;"
                         data-transform_in="y:50px;opacity:0;s:1500;e:Power4.easeInOut;"
                         data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                         data-mask_out="x:inherit;y:inherit;" data-start="2000" data-splitin="none" data-splitout="none"
                         data-responsive_offset="on" style="z-index: 8; white-space: nowrap;">
                        <a href="#" class="btn btn-lg  waves-effect waves-light">Explore More</a>
                    </div>

                    <div class="tp-caption tp-resizeme rs-parallaxlevel-8" data-x="['left','left','left','left']"
                         data-hoffset="['680','680','680','680']" data-y="['top','top','top','top']"
                         data-voffset="['632','632','632','632']" data-width="none" data-height="none"
                         data-whitespace="nowrap" data-transform_idle="o:1;"
                         data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;"
                         data-transform_out="opacity:0;s:1000;s:1000;" data-start="2000" data-responsive_offset="on"
                         style="z-index: 10;">
                        <div class="rs-looped rs-pendulum" data-easing="linearEaseNone" data-startdeg="-20"
                             data-enddeg="360" data-speed="35" data-origin="50% 50%"><img
                                    src="assets/img/parallax/blurflake4.png" alt="" width="240" height="240"
                                    data-ww="['240px','240px','240px','240px']"
                                    data-hh="['240px','240px','240px','240px']" data-no-retina>
                        </div>
                    </div>

                    <div class="tp-caption tp-resizeme rs-parallaxlevel-7" data-x="['left','left','left','left']"
                         data-hoffset="['948','948','948','948']" data-y="['top','top','top','top']"
                         data-voffset="['487','487','487','487']" data-width="none" data-height="none"
                         data-whitespace="nowrap" data-transform_idle="o:1;"
                         data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;"
                         data-transform_out="opacity:0;s:1000;s:1000;" data-start="2000" data-responsive_offset="on"
                         style="z-index: 11;">
                        <div class="rs-looped rs-wave" data-speed="20" data-angle="0" data-radius="50px"
                             data-origin="50% 50%"><img src="assets/img/parallax/blurflake3.png" alt="" width="170"
                                                        height="170" data-ww="['170px','170px','170px','170px']"
                                                        data-hh="['170px','170px','170px','170px']" data-no-retina>
                        </div>
                    </div>

                    <div class="tp-caption tp-resizeme rs-parallaxlevel-4" data-x="['left','left','left','left']"
                         data-hoffset="['719','719','719','719']" data-y="['top','top','top','top']"
                         data-voffset="['200','200','200','200']" data-width="none" data-height="none"
                         data-whitespace="nowrap" data-transform_idle="o:1;"
                         data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;"
                         data-transform_out="opacity:0;s:1000;s:1000;" data-start="2000" data-responsive_offset="on"
                         style="z-index: 12;">
                        <div class="rs-looped rs-rotate" data-easing="Power2.easeInOut" data-startdeg="-20"
                             data-enddeg="360" data-speed="20" data-origin="50% 50%"><img
                                    src="assets/img/parallax/blurflake2.png" alt="" width="50" height="51"
                                    data-ww="['50px','50px','50px','50px']" data-hh="['51px','51px','51px','51px']"
                                    data-no-retina>
                        </div>
                    </div>

                    <div class="tp-caption   tp-resizeme rs-parallaxlevel-6" data-x="['left','left','left','left']"
                         data-hoffset="['187','187','187','187']" data-y="['top','top','top','top']"
                         data-voffset="['216','216','216','216']" data-width="none" data-height="none"
                         data-whitespace="nowrap" data-transform_idle="o:1;"
                         data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;"
                         data-transform_out="opacity:0;s:1000;s:1000;" data-start="2000" data-responsive_offset="on"
                         style="z-index: 13;">
                        <div class="rs-looped rs-wave" data-speed="4" data-angle="0" data-radius="10"
                             data-origin="50% 50%"><img src="assets/img/parallax/blurflake1.png" alt="" width="120"
                                                        height="120" data-ww="['120px','120px','120px','120px']"
                                                        data-hh="['120px','120px','120px','120px']" data-no-retina>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="section-padding banner-6 parallax-bg bg-fixed overlay light-9" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="text-center mb-80">
                <h2 class="section-title text-uppercase">Our Features</h2>
                <p class="section-sub">Quisque non erat mi. Etiam congue et augue sed tempus. Aenean sed ipsum luctus,
                    scelerisque ipsum nec, iaculis justo. Sed at vestibulum purus, sit amet viverra diam nulla ac nisi
                    rhoncus.</p>
            </div>
            <div class="featured-carousel brand-dot">
                <div class="featured-item border-box radius-4 hover brand-hover">
                    <div class="icon mb-30">
                        <i class="material-icons brand-icon">&#xE32A;</i>
                    </div>
                    <div class="desc">
                        <h2>We are creative</h2>
                        <p>Porttitor communicate pandemic data rather than enabled niche pandemic data rather markets
                            neque pulvinar vitae.</p>
                    </div>
                </div>
                <div class="featured-item border-box radius-4 hover brand-hover">
                    <div class="icon mb-30">
                        <i class="material-icons brand-icon">&#xE851;</i>
                    </div>
                    <div class="desc">
                        <h2>We are awesome</h2>
                        <p>Porttitor communicate pandemic data rather than enabled niche pandemic data rather markets
                            neque pulvinar vitae.</p>
                    </div>
                </div>
                <div class="featured-item border-box radius-4 hover brand-hover">
                    <div class="icon mb-30">
                        <i class="material-icons brand-icon">&#xE8AF;</i>
                    </div>
                    <div class="desc">
                        <h2>We are Taltented</h2>
                        <p>Porttitor communicate pandemic data rather than enabled niche pandemic data rather markets
                            neque pulvinar vitae.</p>
                    </div>
                </div>
                <div class="featured-item border-box radius-4 hover brand-hover">
                    <div class="icon mb-30">
                        <i class="material-icons brand-icon">&#xE91D;</i>
                    </div>
                    <div class="desc">
                        <h2>We are secured</h2>
                        <p>Porttitor communicate pandemic data rather than enabled niche pandemic data rather markets
                            neque pulvinar vitae.</p>
                    </div>
                </div>
                <div class="featured-item border-box radius-4 hover brand-hover">
                    <div class="icon mb-30">
                        <i class="material-icons brand-icon">&#xE8CB;</i>
                    </div>
                    <div class="desc">
                        <h2>We are Pationate</h2>
                        <p>Porttitor communicate pandemic data rather than enabled niche pandemic data rather markets
                            neque pulvinar vitae.</p>
                    </div>
                </div>
                <div class="featured-item border-box radius-4 hover brand-hover">
                    <div class="icon mb-30">
                        <i class="material-icons brand-icon">&#xE8DC;</i>
                    </div>
                    <div class="desc">
                        <h2>We are Developer</h2>
                        <p>Porttitor communicate pandemic data rather than enabled niche pandemic data rather markets
                            neque pulvinar vitae.</p>
                    </div>
                </div>
                <div class="featured-item border-box radius-4 hover brand-hover">
                    <div class="icon mb-30">
                        <i class="material-icons brand-icon">&#xE02C;</i>
                    </div>
                    <div class="desc">
                        <h2>We are Designer</h2>
                        <p>Porttitor communicate pandemic data rather than enabled niche pandemic data rather markets
                            neque pulvinar vitae.</p>
                    </div>
                </div>
                <div class="featured-item border-box radius-4 hover brand-hover">
                    <div class="icon mb-30">
                        <i class="material-icons brand-icon">&#xE0BE;</i>
                    </div>
                    <div class="desc">
                        <h2>We are Expert</h2>
                        <p>Porttitor communicate pandemic data rather than enabled niche pandemic data rather markets
                            neque pulvinar vitae.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--<section class="section-padding">--}}
    {{--<div class="container">--}}
    {{--<div class="text-center mb-80">--}}
    {{--<h2 class="section-title text-uppercase">Expert Team</h2>--}}
    {{--<p class="section-sub">Quisque non erat mi. Etiam congue et augue sed tempus. Aenean sed ipsum luctus, scelerisque ipsum nec, iaculis justo. Sed at vestibulum purus, sit amet viverra diam nulla ac nisi rhoncus.</p>--}}
    {{--</div>--}}
    {{--<div class="team-tab" role="tabpanel">--}}

    {{--<ul class="nav nav-tabs nav-justified" role="tablist">--}}
    {{--<li class="active">--}}
    {{--<a href="#team-1" data-toggle="tab">--}}
    {{--<img src="{{ asset('assets/img/team/team-1.jpg') }}" class="img-responsive" alt="Image">--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<a href="#team-2" data-toggle="tab">--}}
    {{--<img src="{{ asset('assets/img/team/team-2.jpg') }}" class="img-responsive" alt="Image">--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<a href="#team-3" data-toggle="tab">--}}
    {{--<img src="{{ asset('assets/img/team/team-3.jpg') }}" class="img-responsive" alt="Image">--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<a href="#team-4" data-toggle="tab">--}}
    {{--<img src="{{ asset('assets/img/team/team-4.jpg') }}" class="img-responsive" alt="Image">--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--</ul>--}}

    {{--<div class="panel-body">--}}
    {{--<div class="tab-content">--}}
    {{--<div role="tabpanel" class="tab-pane fade in active" id="team-1">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-4 col-sm-3">--}}
    {{--<figure class="team-img text-center">--}}
    {{--<img src="{{ asset('assets/img/team/team-large-1.png') }}" class="img-responsive" alt="Image">--}}
    {{--<ul class="team-social-links list-inline">--}}
    {{--<li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-dribbble"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-envelope-o"></i></a></li>--}}
    {{--</ul>--}}
    {{--</figure>--}}
    {{--</div>--}}
    {{--<div class="col-md-8 col-sm-9">--}}
    {{--<div class="team-intro">--}}
    {{--<h3>Elita Chow <small>Product Designer</small></h3>--}}
    {{--<p>A id a torquent tortor at lacus et donec platea eu scelerisque maecenas ac eros a adipiscing id lobortis cum lacus erat. Parturient eleifend adipiscing ultrices a cursus est feugiat porta a at condimentum fames adipiscing odio in nisi venenatis suspendisse suspendisse parturient. Leo congue sociosqu maecenas ligula eu penatibus at suscipit mus scelerisque.</p>--}}
    {{--</div>--}}
    {{--<div class="team-skill">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-6">--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Web Design</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>90%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6">--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Web Design</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>90%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div role="tabpanel" class="tab-pane fade" id="team-2">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-4 col-sm-3">--}}
    {{--<figure class="team-img text-center">--}}
    {{--<img src="{{ asset('assets/img/team/team-large-2.png') }}" class="img-responsive" alt="Image">--}}
    {{--<ul class="team-social-links list-inline">--}}
    {{--<li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-dribbble"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-envelope-o"></i></a></li>--}}
    {{--</ul>--}}
    {{--</figure>--}}
    {{--</div>--}}
    {{--<div class="col-md-8 col-sm-9">--}}
    {{--<div class="team-intro">--}}
    {{--<h3>Jhon Doe <small>Product Developer</small></h3>--}}
    {{--<p>A id a torquent tortor at lacus et donec platea eu scelerisque maecenas ac eros a adipiscing id lobortis cum lacus erat. Parturient eleifend adipiscing ultrices a cursus est feugiat porta a at condimentum fames adipiscing odio in nisi venenatis suspendisse suspendisse parturient. Leo congue sociosqu maecenas ligula eu penatibus at suscipit mus scelerisque.</p>--}}
    {{--</div>--}}
    {{--<div class="team-skill">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-6">--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Web Design</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>90%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6">--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Web Design</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>90%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div role="tabpanel" class="tab-pane fade" id="team-3">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-4 col-sm-3">--}}
    {{--<figure class="team-img text-center">--}}
    {{--<img src="{{ asset('assets/img/team/team-large-3.png') }}" class="img-responsive" alt="Image">--}}
    {{--<ul class="team-social-links list-inline">--}}
    {{--<li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-dribbble"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-envelope-o"></i></a></li>--}}
    {{--</ul>--}}
    {{--</figure>--}}
    {{--</div>--}}
    {{--<div class="col-md-8 col-sm-9">--}}
    {{--<div class="team-intro">--}}
    {{--<h3>Tomas Udoya <small>Product Designer</small></h3>--}}
    {{--<p>A id a torquent tortor at lacus et donec platea eu scelerisque maecenas ac eros a adipiscing id lobortis cum lacus erat. Parturient eleifend adipiscing ultrices a cursus est feugiat porta a at condimentum fames adipiscing odio in nisi venenatis suspendisse suspendisse parturient. Leo congue sociosqu maecenas ligula eu penatibus at suscipit mus scelerisque.</p>--}}
    {{--</div>--}}
    {{--<div class="team-skill">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-6">--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Web Design</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>90%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6">--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Web Design</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>90%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div role="tabpanel" class="tab-pane fade" id="team-4">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-4 col-sm-3">--}}
    {{--<figure class="team-img text-center">--}}
    {{--<img src="{{ asset('assets/img/team/team-large-4.png') }}" class="img-responsive" alt="Image">--}}
    {{--<ul class="team-social-links list-inline">--}}
    {{--<li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-dribbble"></i></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-envelope-o"></i></a></li>--}}
    {{--</ul>--}}
    {{--</figure>--}}
    {{--</div>--}}
    {{--<div class="col-md-8 col-sm-9">--}}
    {{--<div class="team-intro">--}}
    {{--<h3>Jonathon Bin <small>Product Developer</small></h3>--}}
    {{--<p>A id a torquent tortor at lacus et donec platea eu scelerisque maecenas ac eros a adipiscing id lobortis cum lacus erat. Parturient eleifend adipiscing ultrices a cursus est feugiat porta a at condimentum fames adipiscing odio in nisi venenatis suspendisse suspendisse parturient. Leo congue sociosqu maecenas ligula eu penatibus at suscipit mus scelerisque.</p>--}}
    {{--</div>--}}
    {{--<div class="team-skill">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-6">--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Web Design</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>90%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6">--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Web Design</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>90%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="progress-section">--}}
    {{--<span class="progress-title">Mobile Interface</span>--}}
    {{--<div class="progress">--}}
    {{--<div class="progress-bar brand-bg six-sec-ease-in-out" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">--}}
    {{--<span>86%</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    {{--<section class="padding-top-110 padding-bottom-70 brand-bg">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-8 col-md-offset-2">--}}
    {{--<div class="quote-carousel text-center">--}}
    {{--<div class="carousel-item">--}}
    {{--<div class="content">--}}
    {{--<h2 class="white-text line-height-40">"My favorite things in life don't cost any money. It's really clear that the most precious resource we all have is time."</h2>--}}
    {{--<div class="testimonial-meta font-20 text-extrabold white-text">--}}
    {{--Steve Jobes--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="carousel-item">--}}
    {{--<div class="content">--}}
    {{--<h2 class="white-text line-height-40">"My favorite things in life don't cost any money. It's really clear that the most precious resource we all have is time."</h2>--}}
    {{--<div class="testimonial-meta font-20 text-extrabold white-text">--}}
    {{--Steve Jobes--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="carousel-item">--}}
    {{--<div class="content">--}}
    {{--<h2 class="white-text line-height-40">"My favorite things in life don't cost any money. It's really clear that the most precious resource we all have is time."</h2>--}}
    {{--<div class="testimonial-meta font-20 text-extrabold white-text">--}}
    {{--Steve Jobes--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    <section class="section-padding latest-featured-news">
        <div class="container">
            <div class="text-center mb-80">
                <h2 class="section-title text-uppercase">Latest Post</h2>
                <p class="section-sub">Postingan paling baru.</p>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-7">
                    <?php $num = 0; ?>
                    @foreach($artikel as $art)
                        @if( $num == 0)
                            <?php
                            $time = $art->created_at;
                            $date = new DateTime($time);
                            $tgl = $date->format('D d M Y');
                            $kat = strtolower(str_replace(" ", "-", $art->nama_kategori));
                            ?>
                            <article class="post-wrapper featured-news">
                                <div class="thumb-wrapper waves-effect waves-block waves-light">
                                    <a href="#"><img src="{{ asset($art->cover_bg) }}" class="img-responsive"
                                                     alt=""></a>
                                </div>
                                <div class="blog-content">
                                    <header class="entry-header-wrapper">
                                        <div class="entry-header">
                                            <h2 class="entry-title">
                                                <a href="#">{{ $art->judul_artikel }}</a>
                                            </h2>
                                            <div class="entry-meta">
                                                <ul class="list-inline">
                                                    <li>
                                                        <i class="fa fa-user"></i><a href="#">{{ $art->name }}</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-clock-o"></i><a href="#">{{ $tgl }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="entry-content">
                                        {{ $art->deskripsi_singkat }}
                                        <p></p>
                                        <a href="{{ route('home_artikel_kategori_detail',['kategori' => $kat, 'slug_url' => $art->slug_url ]) }}"
                                           class="readmore">Read Full Post <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                        @endif
                        <?php $num++; ?>
                    @endforeach
                </div>
                <div class="col-md-4 col-sm-5">
                    <?php $nums = 0; ?>
                    @foreach($artikel as $art)
                        @if($nums > 0)
                            <?php
                            $kat = strtolower(str_replace(" ", "-", $art->nama_kategori));
                            ?>
                            <article class="post-wrapper">
                                <div class="thumb-wrapper waves-effect waves-block waves-light">
                                    <a href="{{ route('home_artikel_kategori_detail',['kategori' => $kat, 'slug_url' => $art->slug_url ]) }}"><img src="{{ asset($art->cover_bg) }}" class="img-responsive"
                                                     alt=""></a>
                                </div>
                                <div class="blog-content">
                                    <h2 class="entry-title"><a href="{{ route('home_artikel_kategori_detail',['kategori' => $kat, 'slug_url' => $art->slug_url ]) }}">{{ $art->judul_artikel }}</a></h2>
                                </div>
                            </article>
                        @endif
                        <?php $nums++; ?>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery(".materialize-parallax").revolution({
                sliderType: "standard",
                sliderLayout: "fullscreen",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                },
                responsiveLevels: [1240, 1024, 778, 480],
                gridwidth: [1240, 1024, 778, 480],
                gridheight: [700, 600, 500, 500],
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 2000,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                    disable_onmobile: "on"
                },

            });
        });
    </script>
    <script type="text/javascript"
            src="{{ asset('assets/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('assets/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('assets/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('assets/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('assets/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('assets/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <style>
        .banner-4 {
            background-image: url({{ asset($menuhome['pict_banner']) }})
        }
    </style>

@endsection