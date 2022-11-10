<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>EDUXPERT</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    {{-- jquery ui --}}
  <link rel="stylesheet" href="../../../plugins/jquery-ui/jquery-ui.min.css">
    {{-- select2 --}}
  <link rel="stylesheet" href="../../css/select2.css">
  <link rel="stylesheet" href="../../css/hide_pop.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../../../plugins/toastr/toastr.min.css">

{{-- csrf tokn --}}
{{-- <meta id="csrf" name="csrf-token" content="{{ csrf_token() }}"> --}}

</head>
<body class="hold-transition sidebar-mini">

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
                        <h3 class="card-title">Add Lesson</h3>
                            <button id="sign_in" type="button" class="btn btn-secondary float-right" moda>Sign In</button>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->
                        <form id="frmlesson" role="form" method="POST" action="/lessons">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Course:</label>
                                        <select class="form-control" name="course" id="course">
                                            <option value="-1">Select a Course</option>
                                            @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Lesson No:</label>
                                        <input type="text" class="form-control" name="lesson_no" id="lesson_no" >
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title:</label>
                                        <input type="text" class="form-control" name="title" id="title">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button id="btnsubmit_lesson" type="button" class="btn btn-primary">Submit</button>
                        <button id="btnclear" type="button" class="btn btn-danger">Clear</button>
                        <button id="btnupdate" type="button" class="btn btn-dark" hidden>Update</button>
                    </div>
                    </form> <!-- end form -->
                </div>


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Search Lesson</h3>
                        <div class="card-tools">
                            <button id="minimize" type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbllessons" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width:20%">Lesson No</th>
                                    <th style="width:40%">Lesson Title</th>
                                    <th style="width:10%">Attahments</th>
                                    <th style="width:30%">Action</th>
                                    <th hidden></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.body_footerlayout')
</div>
{{-- modals --}}
    <div class="modal fade" id="add_attachment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Attachment</h5>
            <button id="btn_modal_close_up" type="button" class="close"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form method="POST" >
                @csrf
                <div class="form-group">
                <label for="cat_name" class="col-form-label">Attachment Type:</label>
                <select name="type" id="type">
                    <option value="0">video</option>
                    <option value="5">downloadable video</option>
                    <option value="1">pdf</option>
                    <option value="2">presentation</option>
                    <option value="3">image</option>
                    <option value="4">excel</option>
                    <option value="6">Link</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="cat_name" class="col-form-label">Attachment Name:</label>
                    <input type="text" name="attachment_name" id="attachment_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cat_name" class="col-form-label">Attachment:</label>
                    <input type="file" name="attachment" id="attachment" class="form-control">
                </div>
                <div class="form-group">
                    <div class="progress">
                        <div id="upload_progress" class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        <span class="sr-only"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="button" id="btn_add" class="btn btn-primary">Add</button>
                </div>

                <table class="table-responsive-sm table-hover " id="tbl_attachment" hidden>
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th style="width:12cm ">Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" id="btn_modal_close" class="btn btn-secondary">Close</button>

            </form>
            </div>
        </div>
        </div>
    </div>

  {{-- end of the modal --}}

  {{-- video modal --}}
<!-- Modal -->
<div class="modal fade" id="video_view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl video-modal">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="video_title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div id="video_play">
                <video id="video" style="width:79%; height: 500px;" controls controlsList="nodownload">
                    <source id="videosrc" src="" type='video/mp4'>
                    Your browser does not support the video tag.
                    <track src="captions\news.vtt" kind="subtitles" srclang="en" label="English" default>
                  </video>
                  <div>
                    <button class="btn btn-primary btn-xl" id="btn-voice"><i class="fas fa-microphone"></i></button>
                    &nbsp;&nbsp;<button class="btn btn-danger btn-xl" id="btn-voice"><i class="fas fa-download"></i></button>
                    &nbsp;&nbsp;<button class="btn btn-warning btn-xl" id="btn-caption"><i class="fas fa-closed-captioning"></i></button>
                  </div>
            </div>
            <style>
              .cam {
                margin: 0;
                padding: 0;
                width: 100vw;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
              }
          
              canvas {
                position: absolute;
                top: 5px;
                left: 16px;
              }
              .video_view {
                  max-width: 100%;
                  margin: 0;
                  top: 0;
                  bottom: 0;
                  left: 0;
                  right: 0;
                  height: 100%;
                  display: flex;
              }
            </style>
            <div id="cam">
              <video id="video-cam" width="220" height="260"  style="position: absolute; top: 8px; right: 20px;"autoplay muted></video>
            </div>
                   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  {{-- end of video modal --}}

  {{-- danger modal --}}
  <div class="modal fade" id="modal-danger">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Danger Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure wan't to remove this lesson ?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-outline-light">Yes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="user_not_log">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Google Sign IN</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Your'e Not Sign In Google Account</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btn_google_sign">Sign In</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="voice">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Voice to Text Converter</h4>
        </div>
        <div class="voice_to_text form-group col-md-12">
          <textarea name="convert_text" id="convert_text" rows="6" cols="90" class="form-control"></textarea>
          <button id="click_to_record" class="btn btn-success"><i class="fas fa-microphone"></i></button>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


  {{-- Caption Modal --}}
  <div class="modal fade" id="captions-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Generated Captions</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                  @csrf
                    <input type="hidden" id="hid" name="hid">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="rate">Generated Description</label>
                            <textarea type="text" class="form-control" id="caption_des" name="caption_des" placeholder="Enter Bank Name" required></textarea>
                        </div>
                    </div>
                </form>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-success submit" id="submit">Save changes</button> --}}
            <button id="btnupdates" type="button"  class="btn btn-dark">Update</button>
          </div>
      </div>
    </div>
  </div>

<!-- ./wrapper -->
@include('layouts.footerlayout')

<!-- FaceDetaction -->
<script defer src="../../scripts/face-api.min.js"></script>
<script defer src="../../scripts/script.js"></script>

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

<script type="text/javascript" src="../../scripts/gapiclient.js"></script>
<script type="text/javascript" src="../../scripts/lesson_withID.js"></script>

<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()">
</script>



