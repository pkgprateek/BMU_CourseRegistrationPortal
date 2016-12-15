<!-- Logo -->
<a href="/" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">
    <img src="/img/logo.png" alt="BMU Course Registration Portal" width="50px" height="50px">
    </span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><img src="/img/logo.png" alt="BMU Course Registration Portal" width="50px" height="50px"><strong style="margin-left:8px" >BMU</strong>CRP</span>
</a>

<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            @if (Auth::user()->hasRole('admin'))
                <img src="/img/logo.png" class="user-image" alt="User Image">
            @endif
            @if (Auth::user()->hasRole('faculty'))
                <img src="/img/avatar5.png" class="user-image" alt="User Image">
            @endif
            @if(Auth::user()->hasRole('student'))
                <img src="/img/avatar04.png" class="user-image" alt="User Image">
            @endif
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">@if (Auth::user()->hasRole('admin'))
                    Administrator
                @endif
                @if (Auth::user()->hasRole('faculty'))
                    Faculty
                @endif
                @if(Auth::user()->hasRole('student'))
                    Student
                @endif</span>
        </a>
        <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
            @if (Auth::user()->hasRole('admin'))
                <img src="/img/logo.png" class="img-circle" alt="User Image">
            @endif
            @if (Auth::user()->hasRole('faculty'))
                <img src="/img/avatar5.png" class="img-circle" alt="User Image">
            @endif
            @if(Auth::user()->hasRole('student'))
                <img src="/img/avatar04.png" class="img-circle" alt="User Image">
            @endif
            <p>
                @if (Auth::user()->hasRole('admin'))
                    Administrator
                @endif
                @if (Auth::user()->hasRole('faculty'))
                    Faculty
                @endif
                @if(Auth::user()->hasRole('student'))
                    Student
                @endif
                <small></small>
            </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <a href="{{URL::to('logout')}}" method="POST" class="btn btn-default btn-flat">Sign out</a>
            </div>
            </li>
        </ul>
        </li>
    </ul>
    </div>
</nav>