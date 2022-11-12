<!DOCTYPE html>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quick Note and Automatic Assesment</title>
  <!-- <link rel="stylesheet" href="styleQG.css"> -->
  <link rel="stylesheet" href="../../QGcss/style1.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <header>Upload your Lectures</header>
    <!-- <form action="#">
      <input class="file-input" type="file" name="file" hidden>
      <i class="fas fa-cloud-upload-alt"></i>
      <p>Browse File to Upload</p>
    </form> -->

    <form enctype="multipart/form-data" method="post" name="fileinfo">
      <p>
        <br>
        <br>
        <br>
        <br><center>
        <label>File:
          <input type="file" name="file" required />
        </label></center>
      </p>
      <br>
      <br>
    
      <p>
        <button class="btn"><input type="submit" value="Upload"/></button>
      </p>
    </form>

    <section class="progress-area"></section>
    <section class="uploaded-area"></section>
  </div>

  <!-- <script src="script-upload.js"></script> -->
  <script type="text/javascript" src="../../scripts/script-upload.js"></script>

  <style>
    body {
      font-family: "Lato", sans-serif;
    }
    
    .sidenav {
      height: 100%;
      width: 160px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: rgb(41, 39, 39);
      overflow-x: hidden;
      padding-top: 20px;
    }
    
    .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 25px;
      color: #fcdddd;
      display: block;
    }
    
    .sidenav a:hover {
      color: #a5acf1;
    }
    
    .main {
      margin-left: 160px; /* Same as the width of the sidenav */
      font-size: 28px; /* Increased text to enable scrolling */
      padding: 0px 10px;
    }
    
    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }
    </style>
    </head>
    <body>
    
    <div class="sidenav">
          <a href="/Question">Upload Lectures</a>
          <a href="/QGkeyword">Keyword Selection</a>
          <a href="/QG">Question Generator</a>
        </div>
    
  </div>
</body>
</html>
