<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel" style="margin-bottom:20px">
        <div class="pull-left image" style="margin-top:10px">
            @if (Auth::user()->hasRole('admin'))
                <img src="/img/logo.png" class="img-circle" alt="User Image">
            @endif
            @if (Auth::user()->hasRole('faculty'))
                <img src="/img/avatar5.png" class="img-circle" alt="User Image">
            @endif
            @if(Auth::user()->hasRole('student'))
                <img src="/img/avatar04.png" class="img-circle" alt="User Image">
            @endif
        </div>
        <div class="pull-left info"  style="margin-top:20px">
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

            </p>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        
        @if (Auth::user()->hasRole('admin'))
        <!--Faculty-->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user"></i>
                <span>Faculty</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{!! URL::to('add-faculty') !!}">Import / Export</a></li>
                <li><a href="{!! URL::to('view-faculty') !!}">View / Edit</a></li>
                <li><a href="{!! URL::to('assignFaculty') !!}">Assign Faculty</a></li>                
            </ul>
        </li>
        <!--./Faculty-->
        
        <!--Students-->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-child"></i>
                <span>Students</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{!! URL::to('add-students') !!}">Import / Export</a></li>
                <li><a href="{{ URL::to('view-students') }}">View / Edit</a></li>               
            </ul>
        </li>
        <!--./students-->

        <!--Courses-->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-book"></i>
                <span>Semester</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="createSemester">Create</a></li>
                <li><a href="viewSemester">View / Edit</a></li>
            </ul>
        </li>
        <!--./courses-->
        @endif

        @if (Auth::user()->hasRole('faculty'))        
        <!--Students-->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-child"></i>
                <span>Students</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('assignedStudents')}}">View / Edit</a></li>               
                <li><a href="{{ route('validateForm') }}">Verify Registration</a></li>               
            </ul>
        </li>
        <!--./students-->
        @endif

        @if (Auth::user()->hasRole('student'))        
        <!--Students-->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-child"></i>
                <span>Registration</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('semesterRegistration') }}">Register</a></li>               
                <li><a href="{{ route('viewStatus') }}">View Status</a></li>                            
            </ul>
        </li>
        <!--./students-->
        @endif
    </ul>
    <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->