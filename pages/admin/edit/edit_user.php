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
$list=$query->prepare("select * from admin where id=:id");
$list->bindParam(':id',$_GET['id']);
$list->execute();
$data=$list->fetch();
 ?>
 <div class="col-sm-9 main">
 	<div class="container-fluid">
 		<h1 class="page-header">Edit User</h1>
 		<form method="post" action="">
 			<label for="username">Username : </label>
 			<div class="form-group">
 				<input type="text" value="<?php echo $data['username']; ?>" class="form-control" name="username" id="username" required>
 			</div>
 			<label for="nama">Nama : </label>
 			<div class="form-group">
 				<input type="text" value="<?php echo $data['nama']; ?>" class="form-control" name="nama" id="nama" required>
 			</div>
 			<label for="email">Email : </label>
 			<div class="form-group">
 				<input type="text" class="form-control" value="<?php echo $data['email']; ?>" name="email" id="email" required>
 			</div>
 			<label for="status">Status : </label>
 			<div class="form-group">
 				<select type="text" class="form-control seleclive" name="status" id="status" required>
 					<option value="<?php echo $data['status']; ?>" selected><?php echo $data['status']; ?></option>
 					<option value="admin">Admin</option>
 					<option value="petugas">Petugas</option>
 				</select>
 			</div>
 			<input type="submit" name="simpan" class="btn btn-primary">
 		</form>
 		<?php 
            if (isset($_POST['simpan'])) {
            	$username=$_POST['username'];
 			$nama=$_POST['nama'];
 			$email=$_POST['email'];
 			$status=$_POST['status'];
 			$user=$_SESSION['username'];
 			$aktivitas="mengubah user dengan id ".$_GET['id'];
 			$cek=$query->prepare("select * from admin where username=:username");
 			$cek->bindParam(':username',$username);
 			$cek->execute();
 			$cek_user=$cek->fetch();
 			if ($cek_user>0) {
 				echo"<script>alert('Username Sudah Terpakai'); exit();</script>";
 			} else {
 				if (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
    				echo"<script>alert('Hanya Bisa Menggunakan Huruf dan Spasi'); exit();</script>";
				}else{
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    					echo"<script>alert('Email Salah'); exit();</script>";
					}else{
						$sql=$query->prepare("update admin set username=:username,nama=:nama,email=:email,status=:status,update_at=CURRENT_TIMESTAMP,update_by=:user where id=:id");
 						$sql->bindParam(':username',$username);
 						$sql->bindParam(':nama',$nama);
 						$sql->bindParam(':email',$email);
 						$sql->bindParam(':status',$status);
 						$sql->bindParam(':user',$user);
 						$sql->bindParam(':id',$_GET['id']);
 						$hasil= $sql->execute();
 						if (!$hasil) {
 							die("Salah SQL $simpan");
 						}else{
 							$log=$query->prepare("insert into log (username,aktivitas)values(:username,:aktivitas)");
 							$log->bindParam(':username',$user);
 							$log->bindParam(':aktivitas',$aktivitas);
 							$log->execute();
      						echo"<script>alert('Data baru telah tersimpan');
          					  window.location = '../list/list_user.php'; exit();</script>";
 						}}
					}
				}
 			}
 		?>
 	</div>
 </div>
</body>
</html>