@include('layouts.headerlayout')
    {{-- select2 --}}
    <link rel="stylesheet" href="css/select2.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
      <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    {{-- jquery ui --}}
    {{-- <link rel="stylesheet" href="../../plugins/jquery-ui/jquery-ui.min.css"> --}}

<div class="wrapper">

    <!-- Navbar -->
    @include('layouts.navbarlayout')
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <div class="container-fluid">
            <h1 class="text-black-50">Dashboard</h1>
            <br><br>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $User }}</h3>
                            <p>Register Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        {{-- <a href="{{ route('payment_bill') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $l_lessons_attachments }}</h3>
                            <p>Videos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        {{-- <a href="{{ route('payment_bill') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $c_courses }}</h3>
                            <p>Courses</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        {{-- <a href="{{ route('payment_schedule') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $l_lessons }}</h3>
                            <p>Lessons</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        {{-- <a href="{{ route('bank_account') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.body_footerlayout')
</div>
<!-- ./wrapper -->
@include('layouts.footerlayout')
<!-- Toastr -->
<script src="../../../plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../../../plugins/toastr/toastr.min.js"></script>
{{-- sweet alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- form to js -->
<script type="text/javascript" src="../../js/formToJson.js"></script>
{{-- data tables --}}
<script src="../../js/jquery.dataTables.min.js"></script>
<script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
{{-- select 2 --}}
<script src="../../../plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript" src="../../scripts/course.js"></script>

<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()">
</script>


