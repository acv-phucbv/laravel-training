<div class="navbar-default sidebar col-md-2" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        {{--@if(a==0)--}}

        {{--@endif--}}
        <ul class="nav" id="side-menu">
            @if (Auth::guest())

            @elseif(Auth::user()->hasRole('admin') || Auth::user()->hasRole('edit'))
                <li>
                    <a href="/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
            @else

            @endif
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/category">List Category</a>
                    </li>
                    @if (Auth::guest())

                    @elseif(Auth::user()->hasRole('admin') || Auth::user()->hasRole('edit'))
                        <li>
                            <a href="/category/create">Add Category</a>
                        </li>
                    @else

                    @endif
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> Post<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/posts">List Post</a>
                    </li>
                    @if (Auth::guest())

                    @elseif(Auth::user()->hasRole('admin') || Auth::user()->hasRole('edit'))
                        <li>
                            <a href="/posts/create">Add Post</a>
                        </li>
                    @else

                    @endif
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/user">List User</a>
                    </li>
                    @if (Auth::guest())

                    @elseif(Auth::user()->hasRole('admin'))
                        <li>
                            <a href="/user/create">Add User</a>
                        </li>
                    @else

                    @endif
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>