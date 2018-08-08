<div class="header-section">
    <!--toggle button start-->
    <a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
    <!--toggle button end-->
    <!--notification menu start -->
    <div class="menu-right">
        <div class="profile_details">
            <div class="col-md-4 serch-part">
                <div id="sb-search" class="sb-search">
                    <form action="#" method="post">
                        <input class="sb-search-input" placeholder="Search" type="search" name="search" id="search">
                        <input class="sb-search-submit" type="submit" value="">
                        <span class="sb-icon-search"> </span>
                    </form>
                </div>
            </div>
            <!-- search-scripts -->
            <script src="{!! asset('pages/js/classie.js') !!}"></script>
            <script src="{!! asset('pages/js/uisearch.js') !!}"></script>
            <script>
                new UISearch(document.getElementById('sb-search'));

            </script>
            <!-- //search-scripts -->
            <!---->
            <div class="col-md-4 player">
                <div class="audio-player">
                    <audio id="audio">
                        <source src="{!! asset($home->getOneSong()) !!}" type="audio/mp3"></source>
                    </audio>
                </div>
                <!---->
                <script>
                    $(function () {
                        $('#audio').mediaelementplayer({
                            alwaysShowControls: true,
                            features: ['playpause', 'progress', 'volume', 'current', 'tracks', 'duration'],
                            audioVolume: 'horizontal',
                            autosizeProgress: true,

                        });
                    });

                </script>
                <script>
                    var element = document.getElementById('audio');

                    $(document).ready(function () {


                        $("#prew").click(function () {
                            var x = element.currentTime;
                            x = x - 10;
                            element.currentTime = x;

                        });
                        $("#next").click(function () {

                            var x = element.currentTime;
                            x = x + 10;
                            element.currentTime = x;
                        });
                    });

                </script>
                <!--audio-->
                <link rel="stylesheet" type="text/css" media="all" href="{!! asset('pages/css/audio.css') !!}">
                <script type="text/javascript" src="{!! asset('pages/js/mediaelement-and-player.min.js') !!}"></script>
                <!---->
                <!--//-->
                <ul class="next-top">
                    <li><a class="ar" id="prew" href="#"> <img src="{!! asset('pages/images/arrow.png') !!}"
                                                               alt=""/></a></li>
                    <li><a class="ar2" id="next" href="#"><img src="{!! asset('pages/images/arrow2.png') !!}"
                                                               alt=""/></i></a></li>
                </ul>
            </div>
            <div class="col-md-4 login-pop">
                @if(!Auth::user())
                    <div id="loginpop"><a href="#" id="loginButton"><span>Login <i
                                        class="arrow glyphicon glyphicon-chevron-right"></i></span></a><a
                                class="top-sign" href="#" data-toggle="modal" data-target="#myModal5"><i
                                    class="fa fa-sign-in"></i></a>
                        <div id="loginBox">
                            <form action="{{ route('login') }}" method="post" id="loginForm">
                                @csrf
                                <fieldset id="body">
                                    <fieldset>
                                        <label for="email">Email Address</label>
                                        <input type="text" name="email" id="email">
                                    </fieldset>
                                    <fieldset>
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password">
                                    </fieldset>
                                    <input type="submit" id="login" value="Sign in">
                                    <label for="checkbox">
                                        <input type="checkbox" id="checkbox"> <i>Remember me</i></label>
                                </fieldset>
                                <span><a href="#">Forgot your password?</a></span>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="dropdown-toggle-split">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img class="avatar-user-top" src="{!! Auth::user()->avatar !!}">
                            <span>{{Auth::user()->name}}</span>
                        </div>
                        <div class="dropdown-menu">
                            <li><a href="#">Trang cá nhân</a></li>
                            <li><a href="#">Album của tôi</a></li>
                            <li class="divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form></li>
                        </div>
                    </div>
                @endif
            </div>
            <div class="clearfix"></div>
        </div>
        <!-------->
    </div>
    <div class="clearfix"></div>
</div>
