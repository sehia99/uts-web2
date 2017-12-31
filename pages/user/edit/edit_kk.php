
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
	<div class="container-fluid">
		<h1 class="page-header">Edit Kartu Keluarga</h1>
		<form method="post" action="">
		<?php 
			
			//$xid_kk=$_GET['id_kk'];
			$xsql=$query->prepare("select * from kartu_k where id_kk=:xid_kk");
			$xsql->bindParam(':xid_kk',$_GET['id_kk']);
			$xsql->execute();
			$xdata=$xsql->fetch();
		 ?>
		 <label for="nokk">No KK : </label>
			<div class="form-group">
				<input type="text" class="form-control" name="no_kk" value="<?php echo $xdata['no_kk']; ?>" id="nokk" required readonly>
			</div>
			<div class="form-group">
        <label for="nk">Nik Kepala Keluarga :</label>
        <select class="form-control selectlive"  name="nik_kepala" required>
        <option value="<?php echo $xdata['nik_kepala']; ?>" selected disabled><?php echo $xdata['nik_kepala']; ?></option>
        <?php foreach ($data as $value) : ?>
        <option value="<?php echo $value['nik'] ?>">
          <?php echo $value['nama'] ?> (NIK: <?php echo $value['nik'] ?>)
        </option>
        <?php endforeach ?>
      </select>

    </div>
	<label for="alm">Alamat :</label>
        <div class="form-group">
          <textarea rows="5" type="text" class="form-control" name="alamat" id="alm" required><?php echo $xdata['alamat']; ?></textarea>
        </div>
      <label for="tw">RT/RW :</label>
        <div class="form-group">
          <input type="text" class="form-control" value="<?php echo $xdata['rtrw']; ?>" name="rtrw" id="tw" required>
        </div>
      <label for="kel">Kelurahan/Desa :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="kelu" value="<?php echo $xdata['kelu']; ?>" id="kel" required>
        </div>
      <label for="kcmt">Kecamatan :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="keca" id="kcmt" value="<?php echo $xdata['keca']; ?>" required>
        </div>
		<label for="kabu">Kabupaten : </label>
		<div class="form-group">
			<input type="text" class="form-control" name="kabu" value="<?php echo $xdata['kabu']; ?>" id="kabu" required>
		</div>
		<div class="form-group">
			<input type="submit" value="simpan" name="simpan" class="btn btn-primary">
		</div>
		</form>
		<?php 
			if (isset($_POST['simpan'])) {
				$no_kk=$_POST['no_kk'];
    			$nik_kepala=$_POST['nik_kepala'];
   				$alamat=$_POST['alamat'];
    			$rtrw=$_POST['rtrw'];
			    $kelu=$_POST['kelu'];
			    $keca=$_POST['keca'];
				$kabu=$_POST['kabu'];
				$user=$_SESSION['username'];
				$aktivitas="mengubah data kk dengan id kk ".$_GET['id_kk'];
				$usql=$query->prepare("update kartu_k set no_kk=:no_kk, nik_kepala=:nik_kepala, alamat=:alamat, rtrw=:rtrw, kelu=:kelu, keca=:keca,kabu=:kabu, update_at=CURRENT_TIMESTAMP, update_by=:user where id_kk=:xid_kk  ");
				$usql->bindParam(':no_kk',$no_kk);
				$usql->bindParam(':nik_kepala',$nik_kepala);
				$usql->bindParam(':alamat',$alamat);
				$usql->bindParam(':rtrw',$rtrw);
				$usql->bindParam(':kelu',$kelu);
				$usql->bindParam(':keca',$keca);
				$usql->bindParam(':kabu',$kabu);
				$usql->bindParam(':user',$user);
				$usql->bindParam(':xid_kk',$_GET['id_kk']);
				$hasil=$usql->execute();
				if (!$hasil) {
              die("Salah SQL $simpan");
            }else{
              $log=$query->prepare("insert into log (username,aktivitas)values(:username,:aktivitas)");
              $log->bindParam(':username',$_SESSION['username']);
              $log->bindParam(':aktivitas',$aktivitas);
              $log->execute();
                  echo"<script>alert('Data baru telah tersimpan');
                      window.location = '../list/list_kk.php'; exit();</script>";
            }
			}
		 ?>
	</div>
</div>
</body>
</html>