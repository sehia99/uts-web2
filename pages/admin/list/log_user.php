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
$sql=$query->prepare("select * from log");
$sql->execute();
$data=$sql->fetchAll();
?>
<div class="col-sm-9 main">
	<div class="container-fluid">
		<h1 class="page-header">Log Aktivitas User</h1>
		<div class="table-responsive">
			<table class="table table-striped tavle-hover">
				<tr>
					<td>USERNAME</td>
					<td>TANGGAL AKTIVITAS</td>
					<td>AKTIVITAS</td>
				</tr>
				<?php foreach($data as $value): ?>
				<tr>
					<td><?php echo $value['username']; ?></td>
					<td><?php echo $value['create_at']; ?></td>
					<td><?php echo $value['aktivitas']; ?></td>
				</tr>
			<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
</body>
</html>