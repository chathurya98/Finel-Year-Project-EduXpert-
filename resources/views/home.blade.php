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
                <br>
                <br>
                &nbsp;
            &nbsp;
            &nbsp;
                <div class="card" style="width: 18rem;">
            <img src="../../img/study.gif" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Study Tracker</h5>
                <p class="card-text">Helps the student to concentrate on online lecture content via face monitoring while providing a convenient approach 
                    to add text and voice notes to the generated transcript.</p>
            </div>
            </div>
            &nbsp;
            &nbsp;
            &nbsp; &nbsp;
            &nbsp;
            <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Viva Automation</h5>
                <p class="card-text">Provide the opportunity for the student to self-assess themselves by inputting the answer which is then validated against the correct answer. 
                    The similarity of the answers is taken into consideration when assigning a score for the performance.</p>
                <img src="../../img/viva.gif" class="card-img-top" alt="...">

            </div>
            </div>
            &nbsp;
            &nbsp;
            &nbsp; &nbsp;
            &nbsp;
            <div class="card" style="width: 18rem;">
            <img src="../../img/question.gif" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Question Generator</h5>
                <p class="card-text">Generate short notes and questions dynamically based on the uploaded lecture 
                    content and the ability to download the produced outcome as a pdf.</p>
            </div>
            </div>
            &nbsp;
            &nbsp;
            &nbsp; &nbsp;
            &nbsp;
            <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Document Simplifier</h5>
                <p class="card-text">A web scraper which is capable of searching web articles based on the provided keywords and a tool to simplify the 
                    complex document into understandable and coherent sentences via a trained data model.</p>
                <img src="../../img/document.gif" class="card-img-top" alt="...">

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


