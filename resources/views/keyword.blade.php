<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quick Note and Automatic Assessment</title>
    <!-- <link rel="stylesheet" href="style2.css"> -->
    <link rel="stylesheet" href="../../QGcss/style2.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="wrapper">
    
      <div class="file-options">
        <div class="option file-name">
          <label>Enter Keyword</label>
          <input id="word" type="text" spellcheck="false" placeholder="Enter Keyword">
        </div>
        <div class="option save-as">
          
        </div>
      </div>
      <!-- <button id="btn-keyword" class="save-btn" type="button">Extract Lecture Notes</button> -->
      <button id="btn-keyword"  type="button">Extract Lecture Notes</button>
    </div>
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
        <!-- <script src="script-keyword.js"></script>     -->
        <script type="text/javascript" src="../../scripts/script-keyword.js"></script>

  </body>
</html>