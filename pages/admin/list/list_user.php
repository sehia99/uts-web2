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
$sql=$query->prepare("select * from admin where tempo=0");
$sql->execute();
$data=$sql->fetchAll();
?>
<div class="col-sm-9 main">
	<div class="container-fluid">
		<h1 class="page-header">List User</h1>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
					<td>USERNAME</td>
					<td>NAMA</td>
					<td>EMAIL</td>
					<td>STATUS</td>
				</tr>
				<?php foreach($data as $value): ?>
				<tr>
					<td><?php echo $value['username']; ?></td>
					<td><?php echo $value['nama']; ?></td>
					<td><?php echo $value['email']; ?></td>
					<td><?php echo $value['status']; ?></td>
					<td><div class="dropdown">
  							<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Aksi
  							<span class="caret"></span></button>
  							<ul class="dropdown-menu">
   								<li><a href="../edit/edit_user.php?id=<?php echo $value['id']; ?>">Edit</a></li>
    							<li><a href="../hapus/temp_hapus/tmp_user.php?id=<?php echo $value['id']; ?>">Delete</a></li>
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