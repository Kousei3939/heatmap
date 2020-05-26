<?php
include('./config.php');

if(isset($_POST['x_coord']) && isset($_POST['y_coord'])){
	$page = htmlentities($_POST['page']);
	if($page == "/"){ $page = "./index.html"; }
	$xcoord = htmlentities($_POST['x_coord']);
	$ycoord = htmlentities($_POST['y_coord']);
	$time = date( 'Y-m-d H:i:s');

   // 接続を使用する
   $sth = $pdo->query("INSERT INTO clicks (timestamp, page, x, y) VALUES ('$time', '$page', $xcoord, $ycoord)");
   echo "<pre>";
   foreach($sth as $row) {
       print_r($row);
   }
   echo "</pre>";

   // 接続を閉じる
   $sth = null;
   $pdo = null;

	echo "1";
}else{
	echo "０"; // error not all values set
}
?>