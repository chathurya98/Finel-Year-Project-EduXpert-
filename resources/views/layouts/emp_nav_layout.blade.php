<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <div class="user-block">
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                    @if (Auth::user()->uimg)
                    <img class="img-circle img-bordered-sm" src="../../profile_pic/{{ Auth::user()->uimg }}" alt="User Image" style="object-fit:contain;">
                    @else
                    <img class="img-circle img-bordered-sm" src="../../profile_pic/avatar.png" alt="User Image" style="object-fit:contain;">
                    @endif

                </a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                  <li><a href="emp_profile" class="dropdown-item {{ Route::current()->getName() == 'emp_profile' ? 'active' : '' }}">My Profile</a></li>
                  <li><a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
                </ul>
            </li>
       </div>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>


</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/employee_dashboard" class="brand-link">
        {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">EDUXPERT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!--optionally can add the user -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="../../employee_allcourses"
                        class="nav-link {{ Route::current()->getName() == 'employee_allcourses' ? 'active' : '' }}">
                        <i class="fa fa-book"></i> &nbsp;
                        <p>
                            All Courses
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../employee_calender"
                        class="nav-link {{ Route::current()->getName() == 'employee_calender' ? 'active' : '' }}">
                        <i class="fa fa-book"></i> &nbsp;
                        <p>
                            Training Calendar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../emp_mycourse"
                        class="nav-link {{ Route::current()->getName() == 'emp_mycourse' ? 'active' : '' }}">
                        <i class="fa fa-book"></i> &nbsp;
                        <p>
                            My Courses
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
