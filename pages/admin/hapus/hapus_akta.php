<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		include '../../../config.php';
	$sql=$query->prepare("delete from akta where nik=:nik");
	$sql->bindParam(':nik',$_GET['nik']);
	$hasil=$sql->execute();
	if (!$hasil) die("Salah SQL $hapus");

	echo"<script>alert('Data Telah Dihapus Secara Permanen');
				window.location = '../list/list_akta.php'; exit();</script>";
	?>
</body>
</html>