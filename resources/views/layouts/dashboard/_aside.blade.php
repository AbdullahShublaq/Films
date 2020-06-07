<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" href="/"><i
                        class="zmdi zmdi-home m-r-5"></i>Films</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{route('dashboard.admins.edit', auth()->guard('admin')->user())}}"><i class="zmdi zmdi-account-box m-r-5"></i>Profile</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane stretchRight active">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="image"><a href=""><img
                                            src="{{auth()->guard('admin')->user()->avatar}}"
                                            alt="User"></a></div>
                            <div class="detail">
                                <h4>{{auth()->guard('admin')->user()->name}}</h4>
                                <small>{{auth()->guard('admin')->user()->getRoles()[0]}}</small>
                            </div>
                        </div>
                    </li>
                    <li class="header">MAIN <small>(6)</small></li>
                    <li class="active open">
                        <a href="{{route('dashboard.home')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
                    </li>

                    @if(auth()->guard('admin')->user()->hasPermission('read_admins'))
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Admins</span>
                            </a>
                            <ul class="ml-menu">
                                <li><a href="{{route('dashboard.admins.index')}}">All Admins</a></li>
                                @if(auth()->guard('admin')->user()->hasPermission('create_admins'))
                                    <li><a href="{{route('dashboard.admins.create')}}">Add Admins</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->hasPermission('read_clients'))
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-circle"></i><span>Clients</span>
                            </a>
                            <ul class="ml-menu">
                                <li><a href="{{route('dashboard.clients.index')}}">All Clients</a></li>
                                @if(auth()->guard('admin')->user()->hasPermission('create_clients'))
                                    <li><a href="{{route('dashboard.clients.create')}}">Add Clients</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->hasPermission('read_categories'))
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-list"></i><span>Categories</span>
                            </a>
                            <ul class="ml-menu">
                                <li><a href="{{route('dashboard.categories.index')}}">All Categories</a></li>
                                @if(auth()->guard('admin')->user()->hasPermission('create_categories'))
                                    <li><a href="{{route('dashboard.categories.create')}}">Add Categories</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->hasPermission('read_films'))
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-movie"></i><span>Films</span>
                            </a>
                            <ul class="ml-menu">
                                <li><a href="{{route('dashboard.films.index')}}">All Films</a></li>
                                @if(auth()->guard('admin')->user()->hasPermission('create_films'))
                                    <li><a href="{{route('dashboard.films.create')}}">Add Films</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->hasPermission('read_actors'))
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-male"></i><span>Actors</span>
                            </a>
                            <ul class="ml-menu">
                                <li><a href="{{route('dashboard.actors.index')}}">All Actors</a></li>
                                @if(auth()->guard('admin')->user()->hasPermission('create_actors'))
                                    <li><a href="{{route('dashboard.actors.create')}}">Add Actors</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    <li class="header">CLIENTS INTERACTION <small>(3)</small></li>

                    @if(auth()->guard('admin')->user()->hasPermission('read_ratings'))
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-star"></i><span>Ratings</span>
                            </a>
                            <ul class="ml-menu">
                                <li><a href="{{route('dashboard.ratings.index')}}">All Ratings</a></li>
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->hasPermission('read_reviews'))
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-comment-list"></i><span>Reviews</span>
                            </a>
                            <ul class="ml-menu">
                                <li><a href="{{route('dashboard.reviews.index')}}">All Reviews</a></li>
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->hasPermission('read_messages'))
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-email"></i><span>Messages</span>
                            </a>
                            <ul class="ml-menu">
                                <li><a href="{{route('dashboard.messages.index')}}">All Messages</a></li>
                            </ul>
                        </li>
                    @endif

                    <br>

                </ul>
            </div>
        </div>
    </div>
</aside>