<?php 
session_start();
if (!isset($_SESSION['username'])) {
  // jika user belum login
  header('Location: ../../login');
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
include '../../../config.php';
	$sql=$query->prepare("delete from kartu_k where id_kk=:id_kk");
	$sql->bindParam(':id_kk',$_GET['id_kk']);
	$hasil=$sql->execute();
	if (!$hasil) die("Salah SQL $hapus");

	echo"<script>alert('Data Telah Dihapus Secara Permanen');
				window.location = '../trash/trash_kk.php'; exit();</script>";
 ?>
</body>
</html>