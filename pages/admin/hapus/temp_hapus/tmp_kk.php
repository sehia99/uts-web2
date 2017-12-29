<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	include '../../../../config.php';
	$sql=$query->prepare("update kartu_k set tempo=1 where id_kk=:id_kk");
	$sql->bindParam(':id_kk',$_GET['id_kk']);
	$hasil=$sql->execute();
	if (!$hasil) die("Salah SQL $hapus");

	echo"<script>alert('Data Telah Dipindah Ke Trash');
				window.location = '../../list/list_kk.php'; exit();</script>";
 ?>
</body>
</html>