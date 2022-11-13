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
        <section class="content">
            <div class="container-fluid">
                <br>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Student Identification</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- --------------------------------------------------------------------------- -->
                        <!-- form start -->
                        <!-- <form id="frmgform" role="form" method="POST" action="course">
                            @csrf
                            <div class="row">
                                <input type="hidden" id="hid" name="hid">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Course Name</label>
                                        <input class="form-control" name="name" id="name">
                                    </div>
                                </div>
                            </div> -->
                            <!-- -------------------------------------------------------------------------- -->
                            <video id="videoInput" width="720" height="550" muted controls> -->
                            
    

                            
                    </div>
                    <!-- /.card-body -->
                    <!-- <div class="card-footer">
                        <button id="btnsubmit" type="submit" class="btn btn-primary">Submit</button>
                        <button id="btnclear" type="reset" class="btn btn-danger">Clear</button>
                        <button id="btnupdate" type="button"  class="btn btn-dark" hidden>Update</button>
                    </div>
                    </form> end form -->
                </div>


                <!-- <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Search Courses</h3>
                        <div class="card-tools">
                            <button id="minimize" type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div> -->
                    <!-- /.card-header -->
                    <!-- <div class="card-body">
                        <table id="tblgforms" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div> -->
                    <!-- /.card-body -->
                <!-- </div> -->

            </div>
        </section>
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

<!-- <script type="text/javascript" src="../../scripts/course.js"></script> -->

<script defer src="../../facejs/face-api.min.js"></script>
<script defer src="../../facejs/userRecognitionScript.js"></script>

<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()">
</script>


