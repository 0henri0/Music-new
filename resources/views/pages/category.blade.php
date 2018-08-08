@extends('pages.layouts.index') @section('content')
    <!--//pop-up-box -->

    <div class="browse">
        <div class="tittle-head two">
            <h3 class="tittle">New Category <span class="new">New</span></h3>
            <div class="clearfix"></div>
        </div>
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                    <div class="browse-inner">
                        <!-- /agileits -->
                        @foreach($category as $category)
                        <div class="col-md-3 artist-grid">
                            <a href="{{url('categories/'.$category->id)}}"><img class="avatar-category-list" src="{!! $category->avatar !!}" title="{!! $category->name !!}"></a>
                            <a class="art" href="single.html">{!!cutString($category->name,15)!!}</a>
                        </div>
                        @endforeach
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
