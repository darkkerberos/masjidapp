@extends('layouts.layout')
@section('style')
{{--<link rel="stylesheet" href="{{ asset('assets/plugin/jquery-ui-1.12.1/jquery-ui.min.css') }}" />--}}
<link rel="stylesheet" href="{{ asset('assets/css/datepicker.css') }}" />
@endsection
@section('content')
    <section class="page-title ptb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $kategori }}</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('home_artikel') }}">Artikel</a></li>
                        <li class="active">{{ $kategori }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="posts-content default-blog">
                        @foreach($artikels as $artikel)
                            <?php $kat = strtolower(str_replace(" ", "-", $artikel->nama_kategori)); ?>
                        <article class="post-wrapper">
                            <div class="thumb-wrapper">
                                <a href="{{ route('home_artikel_kategori_detail',['kategori' => $kat, 'slug_url' => $artikel->slug_url ]) }}">
                                    <img src="{{ Url($artikel->cover_bg) }}" class="img-responsive" alt=""></a>
                                <div class="entry-header">
                                    <span class="posted-in">
                                        <a href="#">{{ $artikel->nama_kategori }}</a>
                                        </span>
                                    <h2 class="entry-title">
                                        <a href="{{ route('home_artikel_kategori_detail',['kategori' => $kat, 'slug_url' => $artikel->slug_url ]) }}">{{ $artikel->judul_artikel}}</a>
                                    </h2>
                                </div>
                                <div class="author-thumb waves-effect waves-light">
                                    <a href="#"><img src="assets/img/blog/author.jpg" alt=""></a>
                                </div>
                                {{--<span class="post-comments-number">--}}
                                    {{--<i class="fa fa-comments"></i><a href="#">25</a>--}}
                                {{--</span>--}}
                            </div>
                            <div class="entry-content">
                                {!! $artikel->deskripsi_singkat !!}
                            </div>
                        </article>
                        @endforeach
                        {!! $pagination  !!}
                    </div>
                </div>
                @include('layouts.include.widget')
            </div>
        </div>
    </section>
@endsection
@section('scripts')

@endsection
