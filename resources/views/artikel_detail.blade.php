@extends('layouts.layout')
@section('style')
    <meta property="og:image" content="{{ Url($artikel->cover_bg) }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.css') }}" />
@endsection
@section('content')
    <?php $kat = ucwords(str_replace("-", " ", $kategori)); ?>
    <?php
        $time = $artikel->created_at;
        $date = new DateTime($time);
        $tgl = $date->format('D d M Y');
        ?>
    <section class="page-title ptb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $kat }}</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('home_artikel') }}">Artikel</a></li>
                        <li><a href="{{ route("home_artikel_kategori", ['kategori' => $kategori]) }}">{{ $kat }}</a></li>
                        <li class="active">{{ $slug }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="posts-content single-post">
                        <article class="post-wrapper">
                            <header class="entry-header-wrapper clearfix">
                                {{--<div class="author-thumb waves-effect waves-light">--}}
                                    {{--<a href="#"><img src="assets/img/blog/author.jpg" alt=""></a>--}}
                                {{--</div>--}}
                                <div class="entry-header">
                                    <h2 class="entry-title">{{ $artikel->judul_artikel }}</h2>
                                    <div class="entry-meta">
                                        <ul class="list-inline">
                                            <li>
                                                <i class="fa fa-user"></i><a href="#">{{ $artikel->name }}</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-clock-o"></i><a href="#">{{ $tgl }}</a>
                                            </li>
                                            {{--<li>--}}
                                                {{--<i class="fa fa-heart-o"></i><a href="#"><span>1</span></a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<i class="fa fa-comment-o"></i><a href="#">3</a>--}}
                                            {{--</li>--}}
                                        </ul>
                                    </div>
                                </div>
                            </header>
                            <div class="thumb-wrapper">
                                <img src="{{ Url($artikel->cover_bg) }}" class="img-responsive" alt="">
                            </div>
                            <div class="entry-content">
                                {!! $artikel->konten !!}
                            </div>
                            <footer class="entry-footer">
                                <div class="post-tags">
                                    <span class="tags-links">
                                        <i class="fa fa-tags"></i>
                                        <a href="{{ route("home_artikel_kategori", ['kategori' => $kategori]) }}">
                                           {{ $artikel->nama_kategori }}</a>
                                    </span>
                                </div>
                                <ul class="list-inline right share-post">
                                    <li><a href="https://www.facebook.com/sharer.php?u={{ urlencode(URL::current()) }}" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><i class="fa fa-facebook"></i> <span>Share</span></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-twitter"></i> <span>Tweet</span></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i> <span>Plus</span></a>
                                    </li>
                                </ul>
                            </footer>
                        </article>
                        <nav class="single-post-navigation" role="navigation">
                            <div class="row">
                                @if($page['prev'] != 'mentok')
                                <div class="col-xs-6">
                                    <div class="previous-post-link">
                                        <a class="waves-effect waves-light" href="{{ route('home_artikel_kategori_detail',['kategori' => $kategori, 'slug_url' => $page['prev'] ]) }}" >
                                            <i class="fa fa-long-arrow-left"></i>Read Previous Post</a>
                                    </div>
                                </div>
                                @endif
                                @if($page['next'] != 'mentok')
                                <div class="col-xs-6">
                                    <div class="next-post-link">
                                        <a class="waves-effect waves-light" href="{{ route('home_artikel_kategori_detail',['kategori' => $kategori, 'slug_url' => $page['next'] ]) }}" >Read Next Post
                                            <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </nav>
                        <!-- comments below -->
                        {{--@include('layouts.include.comments')--}}
                    </div>
                </div>
                @include('layouts.include.widget')
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('js/utils.js') }}" ></script>
    <script src="{{ asset('assets/js/jadwal.js') }}" ></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var jadwal = jadwalSolat.hariIni();
            $('#imsyak').html(jadwal.imsak);
            $('#subuh').html(jadwal.subuh);
            $('#dzuhur').html(jadwal.dzuhur);
            $('#ashar').html(jadwal.ashar);
            $('#magrib').html(jadwal.magrib);
            $('#isya').html(jadwal.isya);
        });
    </script>
@endsection
