<div class="navbar-default sidebar col-md-2" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        {{--@if(a==0)--}}

        {{--@endif--}}
        <ul class="nav" id="side-menu">
            <li>
                <a href="/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/category">List Category</a>
                    </li>
                    <li>
                        <a href="/category/create">Add Category</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> Post<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/posts">List Post</a>
                    </li>
                    <li>
                        <a href="/posts/create">Add Post</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/user">List User</a>
                    </li>
                    <li>
                        <a href="/user/create">Add User</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>