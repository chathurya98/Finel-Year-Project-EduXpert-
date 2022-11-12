<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Save Text As File</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="../../QGcss/styleQG.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <button id="generate" type="button">Generate</button>
      <textarea id="quizes" spellcheck="false" placeholder="Enter something to save" required></textarea>
      <div class="file-options">
        <div class="option file-name">
          <label>File name</label>
          <input type="text" spellcheck="false" placeholder="Enter file name">
        </div>
        <div class="option save-as">
          <label>Save as</label>
          <div class="select-menu">
            <select>
              <option value="text/plain">Text File (.txt)</option>
              <option value="text/javascript">JS File (.js)</option>
              <option value="text/html">HTML File (.html)</option>
              <option value="image/svg+xml">SVG File (.svg)</option>
              <option value="application/msword">Doc File (.doc)</option>
              <option value="application/vnd.ms-powerpoint">PPT File (.ppt)</option>
            </select>
          </div>
        </div>
      </div>
      <button class="save-btn" type="button">Save As Text File</button>
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

        <!-- <script src="script-generate.js" ></script> -->
        <script type="text/javascript" src="../../scripts/script-generate.js"></script>
  </body>
</html>