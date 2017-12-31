
<?php 
session_start();
if (!isset($_SESSION['username'])) {
  // jika user belum login
  header('Location: ../../../login');
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	include '../../../../config.php';
	$aktivitas="menghapus data kk dengan id kk ".$_GET['id_kk'];
	$sql=$query->prepare("update kartu_k set tempo=1 where id_kk=:id_kk");
	$sql->bindParam(':id_kk',$_GET['id_kk']);
	$hasil=$sql->execute();
	if (!$hasil) {
              die("Salah SQL $simpan");
            }else{
              $log=$query->prepare("insert into log (username,aktivitas)values(:username,:aktivitas)");
              $log->bindParam(':username',$_SESSION['username']);
              $log->bindParam(':aktivitas',$aktivitas);
              $log->execute();
                  echo"<script>alert('Data Telah Dipindah Ke Trash');
                      window.location = '../../list/list_kk.php'; exit();</script>";
            }
 ?>
</body>
</html>