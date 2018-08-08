@extends('pages.layouts.index') @section('content')
    <div id="page-wrapper">
        <div class="inner-content">
            <div class="music-left">
                <!--banner-section-->
                <div class="banner-section">
                    <div class="banner">
                        <div class="callbacks_container">
                            <ul class="rslides callbacks callbacks1" id="slider4">
                                @foreach($home->getAlbumHot() as $album)
                                    <li>
                                        <div class="banner-img">
                                            <img src=" {!! asset($album->avatar) !!}"
                                                 class="img-responsive"
                                                 alt="">
                                        </div>
                                        <div class="banner-info">
                                            <a class="trend" href="single.html">TRENDING</a>
                                            <h3>{{$album->name}}</h3>
                                            <p>Album by <span>{{$album->name}}</span></p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--banner-->
                        <script src="{!! asset('pages/js/responsiveslides.min.js') !!}"></script>
                        <script>
                            // You can also use "$(window).load(function() {"
                            $(function () {
                                // Slideshow 4
                                $("#slider4").responsiveSlides({
                                    auto: true,
                                    pager: true,
                                    nav: true,
                                    speed: 500,
                                    namespace: "callbacks",
                                    before: function () {
                                        $('.events').append("<li>before event fired.</li>");
                                    },
                                    after: function () {
                                        $('.events').append("<li>after event fired.</li>");
                                    }
                                });

                            });

                        </script>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!--//End-banner-->
                <!--albums-->
                <!-- pop-up-box -->
                <link href="{!! asset('pages/css/popuo-box.css') !!}" rel="stylesheet" type="text/css" media="all">
                <script src="{!! asset('pages/js/jquery.magnific-popup.js') !!}" type="text/javascript"></script>
                <script>
                    $(document).ready(function () {
                        $('.popup-with-zoom-anim').magnificPopup({
                            type: 'inline',
                            fixedContentPos: false,
                            fixedBgPos: true,
                            overflowY: 'auto',
                            closeBtnInside: true,
                            preloader: false,
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                        });
                    });

                </script>
                <!--//pop-up-box -->
                <br>

                <div class="albums">
                    <div class="tittle-head">
                        <h3 class="tittle">New Releases<span class="new">New</span></h3>
                        <a href="{!! url('songs') !!}"><h4 style="margin-right: -100px" class="tittle ">See all</h4></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="list-music-home" style="">
                        <ul style="">

                            @foreach($home->getSong() as $song)
                                <li style="">
                                    <div class="info-music">
                                        <div class="info-music-1">
                                            <a href="#">
                                                <img src=" {!! asset($song->avatar) !!}">
                                            </a>
                                        </div>
                                        <div class="info-music-2">
                                            <h4>
                                                <a href="">{!! $song->name !!}</a>
                                            </h4>
                                            <p>
                                                Ca sĩ:{!! $song->name !!}
                                            </p>
                                        </div>
                                        <div class="info-music-icon"><i class="fa fa-headphones"></i>
                                            <h5>{!! $song->view !!}</h5>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!--//End-albums-->
                <!--//discover-view-->
                <div class="albums second">
                    <div class="tittle-head">
                        <h3 class="tittle">Album <span class="new">NEW</span></h3>
                        <a href="{!! url('albums') !!}"><h4 style="margin-right: -100px" class="tittle two">See all</h4></a>
                        <div class="clearfix"></div>
                    </div>
                    @foreach($home->getAlbumSinger() as $album)
                        <div class="col-md-3 content-grid">
                            <a href="{!! url('albumsinger/song/' .$album->id) !!}"><img class="img-albumsinger"
                                             src=" {!! $album->avatar !!}"
                                             title="$album->name"></a>
                            <div class="inner-info"><a href="#"><h5>{{$album->name}}</h5></a></div>
                        </div>
                    @endforeach

                    <div class="clearfix"></div>
                </div>
                <!--//discover-view-->
            </div>
            <!--//music-left-->
            <!--/music-right-->
            <div class="music-right">
                <!--/video-main-->
                <div class="list-home-top">
                    <div>
                        <h1 class="title-right">
                            Bảng xếp hạng <i class="fa fa-music"></i>
                        </h1>
                    </div>
                    <br>
                    <div class="list-music-home" style="">
                        <ul style="">

                            @foreach($home->getSong30Day() as $song)
                                <li style="">
                                    <div class="info-music">
                                        <div class="info-music-1">
                                            <a href="#">
                                                <img src=" {!! $song->avatar !!}">
                                            </a>
                                        </div>
                                        <div class="info-music-2">
                                            <h4>
                                                <a href=""> {{cutString($song->name,15)}}</a>
                                            </h4>
                                            <p>
                                                Ca si : {{cutString($song->name,15)}}
                                            </p>
                                        </div>
                                        <div class="info-music-icon"><i class="fa fa-headphones"></i>
                                            <h5>{{$song->view}}</h5>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="category-top">
                    <div>
                        <h1>
                            Chủ đề hot
                            <i class="fa fa-outdent"></i>
                        </h1>
                    </div>
                    <br>
                    <div class="list-music-home" style="">
                        <ul>
                            @foreach($home->getCategory30Day() as $category)
                                <li>
                                    <div class="info-music">
                                        <div class="info-music-1">
                                            <a href="#">
                                                <img src=" {!! asset($category->avatar) !!}">
                                            </a>
                                        </div>
                                        <div class="info-music-2">
                                            <h4><a href="">{{cutString($category->name,20)}}</a></h4>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="user-new">
                    <div>
                        <h1>
                            User Mới
                            <i class="fa fa-user"></i>
                        </h1>
                    </div>
                    <br>
                    <div class="list-music-home" style="">
                        <ul>
                            @foreach($home->getUser() as $user)
                                <li>
                                    <div class="info-music">
                                        <div class="info-music-1">
                                            <a href="#">
                                                <img class="avatar-user"
                                                     src=" {!! asset($user->avatar) !!}">
                                            </a>
                                        </div>
                                        <div class="info-music-2">
                                            <h4><a href="">{{cutString($user->name,20)}}</a></h4>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </div>
            <!--//music-right-->
            <div class="clearfix"></div>
            <!-- /w3l-agile-its -->
        </div>
        <!--body wrapper start-->
        <div class="review-slider">
            <div class="tittle-head">
                <h3 class="tittle">Featured Albums <span class="new"> New</span></h3>
                <div class="clearfix"></div>
            </div>
            <ul id="flexiselDemo1">
                @foreach($home->getAlbumFeatured() as $album)
                    <li>
                        <a href="{!! url('albumsinger/song/' .$album->id) !!}"><img class="albumfeatured" src=" {!! asset($album->avatar) !!}"
                                                   alt=""/></a>
                        <div class="slide-title">
                            <h4>{{cutString($album->name,20)}} </h4></div>
                        <div class="date-city">
                            <h5>{{cutString($album->singer->name,20)}}</h5>
                            <div class="buy-tickets">
                                <a href="{!! url('albumsinger/song/' .$album->id) !!}">READ MORE</a>
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>
            <script type="text/javascript">
                $(window).load(function () {

                    $("#flexiselDemo1").flexisel({
                        visibleItems: 5,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,
                        pauseOnHover: false,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint: 480,
                                visibleItems: 2
                            },
                            landscape: {
                                changePoint: 640,
                                visibleItems: 3
                            },
                            tablet: {
                                changePoint: 800,
                                visibleItems: 4
                            }
                        }
                    });
                });

            </script>
            <script type="text/javascript" src="{!! asset('pages/js/jquery.flexisel.js') !!}"></script>
        </div>
    </div>
@endsection
