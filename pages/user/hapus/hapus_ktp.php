
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
	$sqls=$query->prepare("select * from ktp where nik=:nik");
	$sqls->bindParam(':nik',$_GET['nik']);
	$sqls->execute();
	$select=$sqls->fetch();
	unlink("../../../foto-ktp/".$select['gambar']);

	$sql=$query->prepare("delete from ktp where nik=:nik");
	$sql->bindParam(':nik',$_GET['nik']);
	$hasil=$sql->execute();
	if (!$hasil) die("Salah SQL $hapus");

	echo"<script>alert('Data Telah Dihapus Secara Permanen');
				window.location = '../trash/trash_ktp.php'; exit();</script>";
?>
</body>
</html>