<!DOCTYPE html>
<html>
<head>
<script src="/jquery-3.5.1.min.js"></script>

<script>
$(document).ready(function() {
    $(document).click(function(e){
      log_click(window.location.href.toString().split(window.location.host)[1], e.pageX, e.pageY);
   });
    var canvas = document.getElementsByTagName('canvas')[0];
    canvas.style.display = "none";   
});
 
function log_click(page, x, y){ // log clicks for heatmap
    $.post("/log_click.php", {
        page: page, 
        x_coord : x,
        y_coord: y
    }, function(data){
        if (data == 1){ 
            console.log("Click logged: " + x + ", " + y);
 
    } else{
      console.log("Error - click not logged " + x + ", " + y);
   }
  }) 
}
 </script>

<?php
include('../config.php');
 
if(isset($_POST['x_coord']) && isset($_POST['y_coord'])){
    $page = htmlentities($_POST['page']);
    if($page == "/"){ $page = "/index.php"; }
    $xcoord = htmlentities($_POST['x_coord']);
    $ycoord = htmlentities($_POST['y_coord']);
    $time = date( 'Y-m-d H:i:s');
 
     $conn = mysql_connect('localhost', $dbuser, $dbpass);
        mysql_select_db($dbname, $conn);
 
        $page = mysql_real_escape_string($page);
        $xcoord = mysql_real_escape_string($xcoord);
        $ycoord = mysql_real_escape_string($ycoord);
 
        mysql_query("INSERT INTO clicks (timestamp, page, x, y) VALUES ('$time', '$page', $xcoord, $ycoord)");
 
    mysql_close($conn);
    echo "1";
}else{
    echo "0"; // error not all values set
}
?>

 <body onload="draw();">
  <canvas id="map" width="400" height="300">
  <script type="text/javascript">
  onload = function() {
    canvas{
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      color: black;
      overflow: visable;
      position: absolute;
      top: 0;
      left: 0;
  }

  </canvas>
  </script>
</head>
<body>
<p>コンテンツ</p>
</body>
</html>