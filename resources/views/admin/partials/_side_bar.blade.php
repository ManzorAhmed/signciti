<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span>
            </h3></div>
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                    <i class="fa fa-dashboard fa-fw"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}" class="waves-effect">
                    <i class="ti-user fa-fw"></i>
                    <span class="hide-menu">Manage Users</span>
                </a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}" class="waves-effect">
                    <i class="ti-menu fa-fw"></i>
                    <span class="hide-menu">Manage Categories</span>
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}" class="waves-effect">
                    <i class="ti-calendar fa-fw"></i>
                    <span class="hide-menu">Manage Products</span>
                </a>
            </li>
            <li>
                <a href="{{ route('fonts.index') }}" class="waves-effect">
                    <i class="ti-ink-pen fa-fw"></i>
                    <span class="hide-menu">Manage Fonts</span>
                </a>
            </li>
            <li>
                <a href="{{route('orders.index')}}" class="waves-effect">
                    <i class="ti-shopping-cart fa-fw"></i>
                    <span class="hide-menu">Manage Orders</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logs.index') }}" class="waves-effect">
                    <i class="ti-calendar fa-fw"></i>
                    <span class="hide-menu">Activity Logs</span>
                </a>
            </li>
            {{--<li>
                <a href="{{ route('questions.index') }}" class="waves-effect">
                    <i class="ti-list fa-fw"></i>
                    <span class="hide-menu">Manage FAQs</span>
                </a>
            </li>--}}
            <li>
                <a href="#" class="waves-effect">
                    <i class="ti-desktop fa-fw"></i>
                    <span class="hide-menu">CMS<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route("sections.index")}}"><i class=" fa-fw">1</i><span
                                class="hide-menu">Sections</span></a></li>
                    <li><a href="{{route("questions.index")}}"><i class=" fa-fw">2</i><span
                                class="hide-menu">Manage FAQs</span></a></li>
                    <li><a href="{{route("contacts.index")}}"><i class=" fa-fw">2</i><span
                                class="hide-menu">Manage Contacts</span></a></li>
                    <li><a href="{{route("subscribers.index")}}"><i class=" fa-fw">3</i><span
                                class="hide-menu">Manage Subscribers</span></a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="waves-effect">
                    <i class="ti-desktop fa-fw"></i>
                    <span class="hide-menu">Blog<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route("blog-categories.index")}}"><i class=" fa-fw">1</i><span
                                class="hide-menu">Categories</span></a></li>
                    <li><a href="{{route("blog-posts.index")}}"><i class=" fa-fw">2</i><span
                                class="hide-menu">Posts</span></a></li>
                </ul>
            <li>
            {{--<li>
                <a href="index.html" class="waves-effect">
                    <i class="ti-user fa-fw"></i>
                    <span class="hide-menu"> Menu<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li> <a href="index.html"><i class=" fa-fw">1</i><span class="hide-menu">Dashboard 1</span></a> </li>
                    <li> <a href="index2.html"><i class=" fa-fw">2</i><span class="hide-menu">Dashboard 2</span></a> </li>
                    <li> <a href="index3.html"><i class=" fa-fw">3</i><span class="hide-menu">Dashboard 3</span></a> </li>
                </ul>
            </li>--}}
            {{--<li>
                <a href="{{ route('messages.index') }}" class="waves-effect">
                    <i class="ti-info fa-fw"></i>
                    <span class="hide-menu">Messages</span>
                </a>
            </li>--}}
            <li>
                <a href="{{ route('setting.index') }}" class="waves-effect">
                    <i class="ti-settings fa-fw"></i>
                    <span class="hide-menu">Settings</span>
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}" class="waves-effect" target="_blank"
                   style="border-left: 0 solid #2f323e;color: aliceblue;background-color: transparent;">
                    <i class="ti-calendar fa-fw"></i>
                    <span class="hide-menu" style="font-size: 14px;font-weight: 300;">Visit Site</span>
                </a>
            </li>
        </ul>
    </div>
</div>
