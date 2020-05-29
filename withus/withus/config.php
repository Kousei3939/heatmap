<?php
$dsn='mysql:dbname=heatmap;host=localhost;charset=utf8mb4';
$user='root';
$password='';

try {
  $pdo = new PDO($dsn,$user,$password);
  // $sql = $pdo->prepare('SELECT * FROM ');
  //  $sql->execute();
  //    $data = $sql->fetch(PDO::FETCH_ASSOC);
  //     var_dump($data);
  //   $pdo = null;
     }
catch(PDOException $e) {
 echo '<h4>接続できていません</h4>' .$e->getMessage();
}
?>
