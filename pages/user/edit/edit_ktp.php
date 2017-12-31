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
$sql_ktp=$query->prepare("select * from ktp where nik=:nik and tempo=0");
$sql_ktp->bindParam(':nik',$_GET['nik']);
$sql_ktp->execute();
$data=$sql_ktp->fetch();
?>
<div class="col-sm-9 main">
	<div class="container-fluid">
		<h1 class="page-header">Edit Foto KTP</h1>
        <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
        <label for="nk">Nik :</label>
        <input type="text" class="form-control" name="nik" value="<?php echo $data['nik']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="foto">Foto : </label>
        <img src="../../../foto-ktp/<?php echo $data['gambar']; ?>" width="100px" height="100px">
        <input type="file" name="myimage" class="form-control" id="foto">
    </div>
    <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
        </form>
        <?php 
if(isset($_POST['simpan']))
	{
		$nik = $_POST['nik'];// user name
  $user=$_SESSION['username'];
  $aktivitas="mengubah gambar ktp dengan nik ".$nik;
  $imgFile = $_FILES['myimage']['name'];
  $tmp_dir = $_FILES['myimage']['tmp_name'];
  $imgSize = $_FILES['myimage']['size'];
  
		if($imgFile)
		{
			$upload_dir = '../../../foto-ktp/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$data['gambar']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
					$edit_gambar=$query->prepare("update ktp set gambar=:upic, update_at=CURRENT_TIMESTAMP, update_by=:update_by where nik=:nik");
			$edit_gambar->bindParam(':upic',$userpic);
			$edit_gambar->bindParam(':update_by',$_SESSION['username']);
			$edit_gambar->bindParam(':nik',$_GET['nik']);
			$hasil=$edit_gambar->execute();
			if (!$hasil) die("Salah SQL $simpan");
                echo"<script>alert('Data baru telah tersimpan');
                    window.location = '../list/list_ktp.php'; exit();</script>";
				}
				else
				{
					echo"<script>alert('File Terlalu Besar'); exit();</script>";
				}
			}
			else
			{
				echo"<script>alert('Hanya File jpeg, jpg, png yang Diperbolehkan'); exit();</script>";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $data['gambar']; // old image from database
			$edit_gambar=$query->prepare("update ktp set gambar=:upic, update_at=CURRENT_TIMESTAMP, update_by=:update_by where nik=:nik");
			$edit_gambar->bindParam(':upic',$userpic);
			$edit_gambar->bindParam(':update_by',$_SESSION['username']);
			$edit_gambar->bindParam(':nik',$_GET['nik']);
			$hasil=$edit_gambar->execute();
			if (!$hasil) {
              die("Salah SQL $simpan");
            }else{
              $log=$query->prepare("insert into log (username,aktivitas)values(:username,:aktivitas)");
              $log->bindParam(':username',$_SESSION['username']);
              $log->bindParam(':aktivitas',$aktivitas);
              $log->execute();
                  echo"<script>alert('Data baru telah tersimpan');
                      window.location = '../list/list_ktp.php'; exit();</script>";
            }
		}	
		
						
	}
        ?>
	</div>
</div>
</body>
</html>