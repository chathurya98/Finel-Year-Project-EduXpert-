<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> --}}
        @csrf
    </form>


</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> -->
        <span class="brand-text font-weight-light">EDUXPERT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!--optionally can add the user -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->

                   <li class="nav-item">
                    <a href="/home"
                        class="nav-link">
                        <i class="fas fa-book-reader"></i>&nbsp;
                        <p>
                           Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="course"
                        class="nav-link">
                        <i class="fas fa-user-graduate"></i>&nbsp;
                        <p>
                            Lesson Name
                        </p>
                    </a>
                </li>
                   <li class="nav-item">
                    <a href="lessons"
                        class="nav-link">
                        <i class="fas fa-plus-circle"></i> &nbsp;
                        <p>
                            Generate Transcript
                        </p>
                    </a>
                </li>
               
                <li class="nav-item">
                    <a href="course"
                        class="nav-link">
                        <i class="far fa-handshake"></i> &nbsp;
                        <p>
                            Viva Automation Tool
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="course"
                        class="nav-link">
                        <i class="fas fa-users"></i>&nbsp;
                        <p>
                            Face Recognition
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/Question"
                        class="nav-link">
                        <i class="fas fa-question-circle"></i> &nbsp;
                        <p>
                            Question Generator
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="course"
                        class="nav-link">
                        <i class="fa fa-book"></i> &nbsp;
                        <p>
                        Document Simplifier
                        </p>
                    </a>
                </li>



                {{-- <li class="nav-item">
                    <a href="../../addlesson"
                        class="nav-link {{ Route::current()->getName() == 'addlesson' ? 'active' : '' }}">
                        <i class="fa fa-video-camera"></i> &nbsp;
                        <p>
                            Lesson Details
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../../create_emp"
                        class="nav-link {{ Route::current()->getName() == 'create_emp' ? 'active' : '' }}">
                        <i class="fa fa-user-circle"></i> &nbsp;
                        <p>
                          Create Student Account
                        </p>
                    </a>
                </li>
 --}}


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
