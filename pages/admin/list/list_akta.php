<?php 
session_start();
if (!isset($_SESSION['username'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}
?>
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
<?php 
include '../bagian/sidebar.php';
include('../bagian/navbar.php');

include '../../../config.php';
$sql=$query->prepare("select * from akta where tempo=0");
$sql->execute();
$data=$sql->fetchAll();
 ?>
 <div class="col-sm-9 main">
 	<div class="content-wrapper">
 	<div class="container-fluid">
 	<h1 class="page-header">List Akta</h1>
 	<div class="table-condensed">
 		<table class="table table-striped">
 			<tr>
 				<td>NIK</td>
 				<TD>NAMA</TD>
 				<td>TEMPAT LAHIR</td>
 				<td >TANGGAL LAHIR</td>
 				<td>JENIS KELAMIN</td>
 				<td>GOLONGAN DARAH</td>
 				<td>ALAMAT</td>
 				<td>RT/RW</td>
 				<td>DESA</td>
 				<td>KECAMATAN</td>
 				<td>AGAMA</td>
 				<td>STATUS</td>
 				<td>PEKERJAAN</td>
 				<td>NAMA AYAH</td>
 				<td>NAMA IBU</td>
 				<td>PENDIDIKAN</td>
 				
 			</tr>
 			<?php foreach ($data as $value): ?>
 				<tr>
 					<td><?php echo $value['nik']; ?></td>
 					<td><?php echo $value['nama']; ?></td>
 					<td><?php echo $value['tempatL']; ?></td>
 					<td><?php echo $value['tanggalL']; ?></td>
 					<td><?php echo $value['gender']; ?></td>
 					<td><?php echo $value['goldarah']; ?></td>
 					<td><?php echo $value['alamat']; ?></td>
 					<td><?php echo $value['rtrw']; ?></td>
 					<td><?php echo $value['desa']; ?></td>
 					<td><?php echo $value['kec']; ?></td>
 					<td><?php echo $value['agama']; ?></td>
 					<td><?php echo $value['status_p']; ?></td>
 					<td><?php echo $value['pekerjaan']; ?></td>
 					<td><?php echo $value['nama_ayah']; ?></td>
 					<td><?php echo $value['nama_ibu']; ?></td>
 					<td><?php echo $value['pendidikan']; ?></td>
 					<td><div class="dropdown">
  							<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Aksi
  							<span class="caret"></span></button>
  							<ul class="dropdown-menu">
   								<li><a href="../edit/edit_akta.php?nik=<?php echo $value['nik']; ?>">Edit</a></li>
    							<li><a href="../hapus/temp_hapus/tmp_akta.php?nik=<?php echo $value['nik']; ?>">Delete</a></li>
  							</ul>
						</div></td>
 				</tr>
 			<?php endforeach; ?>
 		</table>
 	</div>
 </div>
</div>
</div>
</body>
</html>