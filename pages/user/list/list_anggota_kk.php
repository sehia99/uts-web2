<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
    <script src="../../../jquery/jquery-3.2.1.min.js"></script>
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/home.css">
	<title></title>
</head>
<body>
	<?php include '../bagian/sidebar.php';
include('../bagian/navbar.php'); 
include '../../../config.php';
	$sql_kepala=$query->prepare("select * from akta right join kartu_k on akta.nik=kartu_k.nik_kepala where id_kk=:id_kk");
	$sql_kepala->bindParam(':id_kk',$_GET['id_kk']);
	$sql_kepala->execute();
	$kepala_k=$sql_kepala->fetch();
	$sql_anggota=$query->prepare("select akta.*, anggota_kk.status from anggota_kk inner join akta on anggota_kk.nik_anggota=akta.nik where id_kk=:id_kk");
	$sql_anggota->bindParam(':id_kk',$_GET['id_kk']);
	$sql_anggota->execute();
	$anggota_k=$sql_anggota->fetchAll();
	$sql_alamat=$query->prepare("select * from kartu_k where id_kk=:id_kk");
 					$sql_alamat->bindParam(':id_kk',$_GET['id_kk']);
 					$sql_alamat->execute();
 					$alamat_k=$sql_alamat->fetch();
 ?>
 <div class="col-sm-9 main">
 	<div class="container-fluid">
 		<h1 class="page-header">Detail Keluarga (No KK : <?php echo $alamat_k['no_kk']; ?>)</h1>
 		<div class="table-responsive">
 			<h3>Alamat Keluarga</h3>
 			<table class="table table-striped table-hover">
 				 <tr>
 				 	<td>ALAMAT</td>
 				 	<TD>RT/RW</TD>
 				 	<TD>DESA/KELURAHAN</TD>
 				 	<TD>KECAMATAN</TD>
 				 	<TD>KABUPATEN</TD>
 				 </tr>
 				 <tr>
 				 	<td><?php echo $alamat_k['alamat']; ?></td>
 				 	<td><?php echo $alamat_k['rtrw']; ?></td>
 				 	<td><?php echo $alamat_k['kelu']; ?></td>
 				 	<td><?php echo $alamat_k['keca']; ?></td>
 				 	<td><?php echo $alamat_k['kabu']; ?></td>
 				 </tr>
 			</table>
 		</div>
 		 			<br><h3>Kepala Keluarga</h3>
 		<div class="table-responsive">
 			<table class="table table-striped table-hover">
 				<tr>
 					<td>NIK</td>
 				<TD>NAMA</TD>
 				<td>STATUS</td>
 				<td>TEMPAT LAHIR</td>
 				<td >TANGGAL LAHIR</td>
 				<td>JENIS KELAMIN</td>
 				<td>GOLONGAN DARAH</td>
 				<td>AGAMA</td>
 				<td>STATUS PERKAWINAN</td>
 				<td>PEKERJAAN</td>
 				<td>NAMA AYAH</td>
 				<td>NAMA IBU</td>
 				<td>PENDIDIKAN</td>
 				</tr>
 				<tr>
 					<td><?php echo $kepala_k['nik']; ?></td>
 					<td><?php echo $kepala_k['nama']; ?></td>
 					<td>Kepala Keluarga</td>
 					<td><?php echo $kepala_k['tempatL']; ?></td>
 					<td><?php echo $kepala_k['tanggalL']; ?></td>
 					<td><?php echo $kepala_k['gender']; ?></td>
 					<td><?php echo $kepala_k['goldarah']; ?></td>
 					<td><?php echo $kepala_k['agama']; ?></td>
 					<td><?php echo $kepala_k['status_p']; ?></td>
 					<td><?php echo $kepala_k['pekerjaan']; ?></td>
 					<td><?php echo $kepala_k['nama_ayah']; ?></td>
 					<td><?php echo $kepala_k['nama_ibu']; ?></td>
 					<td><?php echo $kepala_k['pendidikan']; ?></td>
 				</tr>
 			</table>
</div>
 			<br><h3>Anggota Keluarga</h3>
 			<div class="table-responsive">
 			<table class="table table-striped table-hover">
 				<tr>
 					<td>NIK</td>
 				<TD>NAMA</TD>
 				<td>STATUS</td>
 				<td>TEMPAT LAHIR</td>
 				<td >TANGGAL LAHIR</td>
 				<td>JENIS KELAMIN</td>
 				<td>GOLONGAN DARAH</td>
 				<td>AGAMA</td>
 				<td>STATUS PPERKAWINAN</td>
 				<td>PEKERJAAN</td>
 				<td>NAMA AYAH</td>
 				<td>NAMA IBU</td>
 				<td>PENDIDIKAN</td>
 				</tr>
 					<?php foreach ($anggota_k as $value) : ?>
 				<tr>
 
 						<td><?php echo $value['nik']; ?></td>
 					<td><?php echo $value['nama']; ?></td>
 					<td><?php echo $value['status']; ?></td>
 					<td><?php echo $value['tempatL']; ?></td>
 					<td><?php echo $value['tanggalL']; ?></td>
 					<td><?php echo $value['gender']; ?></td>
 					<td><?php echo $value['goldarah']; ?></td>
 					<td><?php echo $value['agama']; ?></td>
 					<td><?php echo $value['status_p']; ?></td>
 					<td><?php echo $value['pekerjaan']; ?></td>
 					<td><?php echo $value['nama_ayah']; ?></td>
 					<td><?php echo $value['nama_ibu']; ?></td>
 					<td><?php echo $value['pendidikan']; ?></td>

 				</tr>
 				<?php endforeach; ?>
 			</table>
 		</div>
 		</div>
 	</div>
 </div>
</body>
</html>