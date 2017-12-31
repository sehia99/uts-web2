<?php 
session_start();
if (!isset($_SESSION['username'])) {
  // jika user belum login
  header('Location: ../../../login');
  exit();}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include '../../../../config.php';
	$aktivitas="menghapus user dengan id ".$_GET['id'];
	$sql=$query->prepare("update admin set tempo=1 where id=:id");
	$sql->bindParam(':id',$_GET['id']);
	$hasil=$sql->execute();
	if (!$hasil) {
              die("Salah SQL $simpan");
            }else{
              $log=$query->prepare("insert into log (username,aktivitas)values(:username,:aktivitas)");
              $log->bindParam(':username',$_SESSION['username']);
              $log->bindParam(':aktivitas',$aktivitas);
              $log->execute();
                  echo"<script>alert('Data Telah Dipindah Ke Trash');
                      window.location = '../../list/list_user.php'; exit();</script>";
            }
 ?>
</body>
</html>