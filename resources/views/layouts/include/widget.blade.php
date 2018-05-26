<div class="col-md-4">
    <div class="tt-sidebar-wrapper" role="complementary">
        {{--<div class="widget widget_search">--}}
            {{--<form role="search" method="get" class="search-form">--}}
                {{--<input type="text" class="form-control" value="" name="s" id="s" placeholder="Write any keywords">--}}
                {{--<button type="submit"><i class="fa fa-search"></i></button>--}}
            {{--</form>--}}
        {{--</div>--}}
        <div class="widget widget_tt_author_widget">
            <div class="author-info-wrapper">
                <div class="author-avatar" style="padding: 15px;">
                    <center>
                        <h2>Waktu Solat</h2>
                        <span><?php echo date('D d F Y'); ?></span>
                    </center>
                </div>
                <div class="col-md-12">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Imsyak</th>
                            <td id="imsyak"></td>
                        </tr>
                        <tr>
                            <th>Subuh</th>
                            <td id="subuh"></td>
                        </tr>
                        <tr>
                            <th>Dzuhur</th>
                            <td id="dzuhur"></td>
                        </tr>
                        <tr>
                            <th>Ashar</th>
                            <td id="ashar"></td>
                        </tr>
                        <tr>
                            <th>Magrib</th>
                            <td id="magrib"></td>
                        </tr>
                        <tr>
                            <th>Isya</th>
                            <td id="isya"></td>
                        </tr>

                    </tbody>
                </table>
                </div>
                <p>Jangan lupa menunaikan solat 5 waktu.</p>
                {{--<div class="author-social-links">--}}
                    {{--<ul class="list-inline">--}}
                        {{--<li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>--}}
                        {{--<li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>--}}
                        {{--<li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>--}}
                        {{--<li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>--}}
                        {{--<li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            </div>
        </div>
        <div class="widget widget_tt_popular_post">
            <div id="kalender"></div>
        </div>
        <div class="widget widget_categories">
            <h3 class="widget-title">Categories</h3>
            <ul>
                <li><a href="#">Technology</a></li>
                <li><a href="#">Media</a></li>
                <li><a href="#">Video</a></li>
                <li><a href="#">Audio</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Material</a></li>
            </ul>
        </div>
        <div class="widget widget_tt_twitter">
            <i class="fa fa-twitter"></i>
            <div id="twitter-gallery-feed">
                <div class="twitter-widget"></div>

            </div>
        </div>
        <div class="widget widget_tt_instafeed">
            <i class="fa fa-instagram"></i>
            <h3 class="widget-title">Instagram Photos</h3>
            <div id="myinstafeeds">

            </div>
        </div>
    </div>
</div>
