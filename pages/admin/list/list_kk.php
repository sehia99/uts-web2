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
$sql=$query->prepare("select * from kartu_k where tempo=0");
$sql->execute();
$data=$sql->fetchAll();
?>
<div class="col-sm-9 main">
	<div class="container-fluid">
		<h1 class="page-header">List Kartu Keluarga</h1>
		<div class=" table-responsive">
			<table width="120%" class="table table-striped table-hover">
				<tr>
					<th>NO KK</th>
					<th>NIK KEPALA KELUARGA</th>
					<th>ALAMAT</th>
					<th>RT/RW</th>
					<th>KELURAHAN</th>
					<th>KECAMATAN</th>
					<th>KABUPATEN</th>
					<th>ANGGOTA KELUARGA</th>
					<th>OPTION</th>
				</tr>
				<?php foreach ($data as $value): ?>
				<tr>
					<td><?php echo $value['no_kk']; ?></td>
					<td><?php echo $value['nik_kepala']; ?></td>
					<td><?php echo $value['alamat']; ?></td>
					<td><?php echo $value['rtrw']; ?></td>
					<td><?php echo $value['kelu']; ?></td>
					<td><?php echo $value['keca']; ?></td>
					<td><?php echo $value['kabu']; ?></td>
					<td><?php $sqlc=$query->prepare("select count(*) as jumlah from anggota_kk where id_kk=:id_kk") ;
							$sqlc->bindParam(':id_kk', $value['id_kk']);
							$sqlc->execute();
							$datac=$sqlc->fetch();
							echo $datac['jumlah'];
							 ?></td>
					<td><div class="dropdown">
  							<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Aksi
  							<span class="caret"></span></button>
  							<ul class="dropdown-menu">
   								<li><a href="../edit/edit_kk.php?id_kk=<?php echo $value['id_kk']; ?>">Edit</a></li>
    							<li><a href="../hapus/temp_hapus/tmp_kk.php?id_kk=<?php echo $value['id_kk']; ?>">Delete</a></li>
    							<li><a href="list_anggota_kk.php?id_kk=<?php echo $value['id_kk']; ?>">Detail</a></li>
    							<li><a href="../daftar/anggota_kk.php?id_kk=<?php echo $value['id_kk']; ?>">Tambah Anggota</a></li>
  							</ul>
						</div></td>
				</tr>
			<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
</body>
</html>