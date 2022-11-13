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
                        <h3 class="card-title">Viva Automation</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->
                            <div class="row">
                                <input type="hidden" id="hid" name="hid">
                                <!-- <div class="col-md-5"> -->
                                    <!-- <div class="form-group">
                                        <label>Quetion Number</label>
                                        <input class="form-control" name="name" id="name">
                                    </div> -->
                                    <div class="voice_to_text" style="width:100%">
                                        <h1 id="question">1. Name a principle in object oriented programming</h1>
                                        <br />
                                        <div class="row">
                                        <textarea name="convert_text" id="convert_text" rows="4" cols="50"></textarea>
                                        <h3 style="margin-left:300px">Marks - <span id="marks">0</span> / 10</h3>
                                        </div>    
                                    </div>
                                    
                                    <div class="col-md-5" style="padding-top:10px">
                                        <button id="voice">Voice To Text</button>
                                        <input type="button" value="Check Answer" id="inc" onclick="checkAnswer()"/>
                                        <input type="button" value="Next" id="inc" onclick="incNumber()"/>
                                        <h2 id="check"> </h2>
                                    </div>
                                    
                                    


                                <!-- </div> -->
                            </div>
                    </div>
                    <!-- /.card-body -->
                    <!-- <div class="card-footer">
                        <button id="btnsubmit" type="submit" class="btn btn-primary">Submit</button>
                        <button id="btnclear" type="reset" class="btn btn-danger">Clear</button>
                        <button id="btnupdate" type="button"  class="btn btn-dark" hidden>Update</button>
                    </div> -->
                     <!-- end form -->
                </div>

<!-- 
                <div class="card">
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

<script type="text/javascript" src="../../scripts/viva_automation.js"></script>

<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()">
</script>


