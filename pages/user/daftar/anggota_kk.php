
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
		<form method="post" action="">
			<div class="form-group">
        <label for="nk">Nik Anggota Keluarga :</label>
        <select class="form-control selectlive" name="nik" required>
        <option value="" selected disabled>- pilih -</option>
        <?php foreach ($data as $value) : ?>
        <option value="<?php echo $value['nik'] ?>">
          <?php echo $value['nama'] ?> (NIK: <?php echo $value['nik'] ?>)
        </option>
        <?php endforeach ?>
      </select></div>
      <div class="form-group">
      	<label for="sts">Status Dalam Keluarga : </label>
      	<select class="form-control selectlive" name="status" required>
      		<option value="" disabled selected>Pilih</option>
      		<option value="istri">Istri</option>
      		<?php $i=array("1","2","3","4","5","6","7","8");
      		 foreach ($i as $urut) : ?>
      		<option value="Anak ke <?php echo $urut; ?>">Anak ke <?php echo $urut; ?></option>
      		<?php endforeach; ?>
      	</select>
    </div>
    <input type="submit" class="btn btn-primary" name="simpan" value="Tambah Data">
		</form>
		<?php 
			if (isset($_POST['simpan'])) {
				$nik=$_POST['nik'];
				$status=$_POST['status'];
				$user=$_SESSION['username'];
				$aktivitas="menambah anggota kk dengan id kk ".$_GET['id_kk']." dan nik anggota ".$nik;
				$cek=$query->prepare("select * from kartu_k where id_kk=:cid_kk");
				$cek->bindParam('cid_kk',$_GET['id_kk']);
				$cek->execute();
				$cek_data=$cek->fetch();
				if ($cek_data['nik_kepala']==$nik) {
					echo"<script>alert('Nik Sudah Terpakai Sebagai Kepala Keluarga'); exit();</script>";
				} else {
					$cekang=$query->prepare("select * from anggota_kk where nik_anggota=:nik_anggota");
					$cekang->bindParam(':nik_anggota',$nik);
					$cekang->execute();
					$cek_ang=$cekang->fetch();
					if ($cek_ang>0) {
						echo"<script>alert('Nik Sudah Terpakai Sebagai Anggota Keluarga'); exit();</script>";
					} else {
						$sql=$query->prepare("insert into anggota_kk (id_kk,nik_anggota, status,create_by)value(:id_kk,:nik,:status,:create_by)");
				$sql->bindParam(':id_kk',$_GET['id_kk']);
				$sql->bindParam(':nik',$nik);
				$sql->bindParam(':status',$status);
				$sql->bindParam('create_by',$user);
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
</div>
</body>
</html>