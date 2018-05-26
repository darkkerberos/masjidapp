<footer class="footer footer-four">
    <div class="primary-footer brand-bg text-center">
        <div class="container">
            <a href="#top" class="page-scroll btn-floating btn-large pink back-top waves-effect waves-light tt-animate btt" data-section="#top">
                <i class="material-icons">&#xE316;</i>
            </a>
            <ul class="social-link tt-animate ltr mt-20">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
            </ul>
            <hr class="mt-15">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-logo">
                        <img src="{{ asset('assets/img/almagfirah.png') }}" alt="">
                    </div>
                    <span class="copy-text">Copyright &copy; 2018 <a href="#">AlMagirah</a> &nbsp; | &nbsp; All Rights Reserved &nbsp; | &nbsp; Authorized By <a href="#">DarkKerberos with <3</a></span>
                    <div class="footer-intro">
                        {{--<p>Penatibus tristique velit vestibulum adipiscing habitant aenean feugiat at condimentum aptent odio orci vulputate hac mollis a.Vestibulum adipiscing gravida justo a ac euismod vitae.</p>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="secondary-footer brand-bg darken-2 text-center">
        <div class="container">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('jadwal') }}">Jadwal</a></li>
                <li><a href="{{ route('home_artikel') }}">Artikel</a></li>
                <li><a href="{{ route('kontak') }}">Kontak Kami</a></li>
            </ul>
        </div>
    </div>
</footer>