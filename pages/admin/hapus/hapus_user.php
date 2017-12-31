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
	$sql=$query->prepare("delete from admin where id=:id");
	$sql->bindParam(':id',$_GET['id']);
	$hasil=$sql->execute();
	if (!$hasil) die("Salah SQL $hapus");

	echo"<script>alert('Data Telah Dihapus Secara Permanen');
				window.location = '../trash/trash_user.php'; exit();</script>";
?>
</body>
</html>