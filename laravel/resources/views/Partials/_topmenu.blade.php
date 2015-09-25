
        <!-- 2. $MAIN_NAVIGATION ===========================================================================

            Main navigation
        -->
        <div id="main-navbar" class="navbar navbar-inverse" role="navigation">
            <!-- Main menu toggle -->
            <button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span class="hide-menu-text">HIDE MENU</span></button>

            <div class="navbar-inner">
                <!-- Main navbar header -->
                <div class="navbar-header">

                    <!-- Logo -->
                    <a href="index.html" class="navbar-brand">
                        <div><img alt="Cinema" src=""></div>
                        Cinema
                    </a>

                    <!-- Main navbar toggle -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>

                </div> <!-- / .navbar-header -->

                <div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
                    <div>
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('movies.index') }}"><i class="fa fa-search"></i> See movies</a></li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-film"></i> Movies</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('movies.index') }}"><i class="fa fa-search"></i> See movies</a></li>
                                    <li><a href="{{ route('movies.create') }}"><i class="fa fa-plus"></i> Create Movies</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sitemap"></i> Categories</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('category.index') }}"><i class="fa fa-search"></i> See Categories</a></li>
                                    <li><a href="{{ route('category.create') }}"><i class="fa fa-plus"></i> Create Categories</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-star"></i> Actors</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('actors.index') }}"><i class="fa fa-search"></i> See Actors</a></li>
                                    <li><a href="{{ route('actors.create') }}"><i class="fa fa-plus"></i> Create Actors</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-black-tie"></i> Directors</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('directors.index') }}"><i class="fa fa-search"></i> See Directors</a></li>
                                    <li><a href="{{ route('directors.create') }}"><i class="fa fa-plus"></i> Create Directors</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> User</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('users.index') }}"><i class="fa fa-search"></i> See User</a></li>
                                    <li><a href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Create User</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-commenting-o"></i>  Comments</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('comments.index') }}"><i class="fa fa-search"></i> See comments</a></li>
                                    <li><a href=""><i class="fa fa-plus"></i> Create comments</a></li>
                                </ul>
                            </li>

                        </ul>



                        <div class="right clearfix">
                            <ul class="nav navbar-nav pull-right right-navbar-nav">

                                <!-- 3. $NAVBAR_ICON_BUTTONS =======================================================================

                                                            Navbar Icon Buttons

                                                            NOTE: .nav-icon-btn triggers a dropdown menu on desktop screens only. On small screens .nav-icon-btn acts like a hyperlink.

                                                            Classes:
                                                            * 'nav-icon-btn-info'
                                                            * 'nav-icon-btn-success'
                                                            * 'nav-icon-btn-warning'
                                                            * 'nav-icon-btn-danger'
                                -->
                                <li class="nav-icon-btn nav-icon-btn-danger dropdown">
                                    <a href="#notifications" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="label">{{  \App\Model\Notifications::count() }}</span>
                                        <i class="nav-icon fa fa-bullhorn"></i>
                                        <span class="small-screen-text">Notifications</span>
                                    </a>

                                    <!-- NOTIFICATIONS -->

                                    <!-- Javascript -->
                                    <script>
                                        init.push(function () {
                                            $('#main-navbar-notifications').slimScroll({ height: 250  });
                                        });
                                    </script>
                                    <!-- / Javascript -->


                                    <div class="dropdown-menu widget-notifications no-padding" style="width: 300px" >
                                        <div class="notifications-list" id="main-navbar-notifications">
                                            @forelse(\App\Model\Notifications::orderBy('created_at','desc')->take(15)->get() as $notification)

                                                    <div class="notification">
                                                        <div class="notification-title {{$notification->criticity or 'info' }}">{{$notification->message}}</div>
                                                        @if($notification->category)
                                                        <div class="notification-description">
                                                            <strong>{{$notification->category['id']}}</strong> {{$notification->category['title']}}

                                                        </div>
                                                        @endif
                                                            <div class="notification-ago">
                                                                {{\Carbon\Carbon::createFromTimestamp(strtotime($notification->created_at))->diffForHumans()}}
                                                            </div>
                                                        <div class="notification-icon fa fa-hdd-o bg-danger"></div>
                                                    </div> <!-- / .notification -->
                                                @empty
                                                    <div class="'alert">
                                                        <i class="fa fa-warbing"></i>Aucune notification en cours
                                                    </div>
                                            @endforelse


                                        </div> <!-- / .notifications-list -->
                                        <a href="#" class="notifications-link">MORE NOTIFICATIONS</a>
                                    </div> <!-- / .dropdown-menu -->
                                </li>
                                <li class="nav-icon-btn nav-icon-btn-success dropdown">
                                    <a href="#messages" class="dropdown-toggle" data-toggle="dropdown">

                                        <span class="label">10</span>
                                        <i class="nav-icon fa fa-envelope"></i>
                                        <span class="small-screen-text">Income messages</span>
                                    </a>

                                    <!-- MESSAGES -->

    {{--                                {{dump(session('favoris'))}}--}}

                                    <div  class="dropdown-menu widget-messages-alt no-padding" style="width: 300px;">
                                        <div class="messages-list" id="favmovies"  data-url="{{route('sessions.boxmovie')}}">

                                            @foreach(session("favoris",[]) as $key  => $val )


                                            <div class="message">
                                                <img src="{{\App\Model\Movies::select('image')->where('id','=',(int)$val)->first()->image}}" alt="" class="message-avatar">

                                                <a href="#" class="message-subject"> {{\App\Model\Movies::select('title')->where('id','=',(int)$val)->first()->title}}</a>
                                                <div class="message-description">


                                                </div>
                                            </div> <!-- / .message -->
                                            @endforeach


                                        </div> <!-- / .messages-list -->

                                        <span data-href="{{route('movies.favbox')}}" id='favbox' class="messages-link">DELETE</span>

                                    </div> <!-- / .dropdown-menu -->
                                </li>
                                <!-- /3. $END_NAVBAR_ICON_BUTTONS -->


                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
                                        <img src="{{Auth::user()->photo}}" alt="">
                                        <span>{{Auth::user()->name}}</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><span class="label label-warning pull-right">New</span>Profile</a></li>
                                        <li><a href="{{ route('account') }}"><span class="badge badge-primary pull-right">New</span>Account</a></li>
                                        <li><a href="#"><i class="dropdown-icon fa fa-cog"></i>&nbsp;&nbsp;Settings</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{url('auth/logout')}}"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
                                    </ul>
                                </li>
                            </ul> <!-- / .navbar-nav -->
                        </div> <!-- / .right -->
                    </div>
                </div> <!-- / #main-navbar-collapse -->
            </div> <!-- / .navbar-inner -->
        </div> <!-- / #main-navbar -->
        <!-- /2. $END_MAIN_NAVIGATION -->
