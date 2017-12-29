<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	include '../../../../config.php';
	$sql=$query->prepare("update akta set tempo=1 where nik=:nik");
	$sql->bindParam(':nik',$_GET['nik']);
	$hasil=$sql->execute();
	if (!$hasil) die("Salah SQL $hapus");

	echo"<script>alert('Data Telah Dipindah Ke Trash');
				window.location = '../../list/list_akta.php'; exit();</script>";
	 ?>
</body>
</html>