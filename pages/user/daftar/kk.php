
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
$list=$query->prepare("select * from akta where tempo=0");
$list->execute();
$data=$list->fetchAll();
?>
<div class="col-sm-9 main">
	<div class="container-fluid">
			<h1 class="page-header">Pendaftaran KK</h1>
			<form action="" method="post">
			<label for="nokk">No KK : </label>
			<div class="form-group">
				<input type="text" class="form-control" name="no_kk" id="nokk" required>
			</div>
			<div class="form-group">
        <label for="nk">Nik Kepala Keluarga :</label>
        <select class="form-control selectlive" name="nik_kepala" required>
        <option value="" selected disabled>- pilih -</option>
        <?php foreach ($data as $value) : ?>
        <option value="<?php echo $value['nik'] ?>">
          <?php echo $value['nama'] ?> (NIK: <?php echo $value['nik'] ?>)
        </option>
        <?php endforeach ?>
      </select>

    </div>
	<label for="alm">Alamat :</label>
        <div class="form-group">
          <textarea rows="5" type="text" class="form-control" name="alamat" id="alm" required></textarea>
        </div>
      <label for="tw">RT/RW :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="rtrw" id="tw" required>
        </div>
      <label for="kel">Kelurahan/Desa :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="kelu" id="kel" required>
        </div>
      <label for="kcmt">Kecamatan :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="keca" id="kcmt" required>
        </div>
		<label for="kabu">Kabupaten : </label>
		<div class="form-group">
			<input type="text" class="form-control" name="kabu" id="kabu" required>
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
  $aktivitas="menambah data akta baru dengan no kk ".$no_kk;
  $cek_kk=$query->prepare("select * from kartu_k where no_kk=:no_kk");
  $cek_kk->bindParam(':no_kk',$no_kk);
  $cek_kk->execute();
  $cek_no_kk=$cek_kk->fetch();
  if ($cek_no_kk>0) {
    echo"<script>alert('No KK Sudah Terpakai'); exit();</script>";
  } else {
    $cek_kepala=$query->prepare("select * from kartu_k where nik_kepala=:nik_kepala");
    $cek_kepala->bindParam(':nik_kepala',$nik_kepala);
    $cek_kepala->execute();
    $cek_no_kepala=$cek_kepala->fetch();
    if ($cek_no_kepala>0) {
      echo"<script>alert('Nik Sudah Terpakai'); exit();</script>";
    } else {
      $sql=$query->prepare("insert into kartu_k(no_kk,nik_kepala,alamat,rtrw,kelu,keca,kabu,create_by)values(:no_kk,:nik_kepala,:alamat,:rtrw,:kelu,:keca,:kabu,:user)");
  $sql->bindParam(':no_kk',$no_kk);
  $sql->bindParam(':nik_kepala',$nik_kepala);
  $sql->bindParam(':alamat',$alamat);
  $sql->bindParam(':rtrw',$rtrw);
  $sql->bindParam(':kelu',$kelu);
  $sql->bindParam(':keca',$keca);
  $sql->bindParam(':kabu',$kabu);
  $sql->bindParam(':user',$user);
  $hasil=$sql->execute();
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
    
  }
  
	
 	}
 ?>
</div>
</body>
</html>