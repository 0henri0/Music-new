@extends('pages.layouts.index') @section('content')
    <!--//pop-up-box -->

    <div class="browse">
        <div class="tittle-head two">
            <h3 class="tittle">New Song <span class="new">New</span></h3>
            <div class="clearfix"></div>
        </div>
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                    <div class="browse-inner">
                        <!-- /agileits -->
                        <div class="list-music" style="">
                            <ul style="">
                                @foreach($listSong as $song)
                                    <li>
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
                                                <h5>{{$song->view}} </h5>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        {{ $listSong->links() }}
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /agileinfo -->
    </div>
    <!--//End-albums-->
    <div class="review-slider">
        <div class="tittle-head">
            <h3 class="tittle">Featured Albums <span class="new"> New</span></h3>
            <div class="clearfix"></div>
        </div>
        <ul id="flexiselDemo1">
            @foreach($home->getAlbumFeatured() as $album)
                <li>
                    <a href="single.html"><img class="albumfeatured" src=" {!! asset($album->avatar) !!}"
                                               alt=""/></a>
                    <div class="slide-title">
                        <h4>{{cutString($album->name,20)}} </h4></div>
                    <div class="date-city">
                        <h5>{{cutString($album->singer->name,20)}}</h5>
                        <div class="buy-tickets">
                            <a href="single.html">READ MORE</a>
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
@endsection
