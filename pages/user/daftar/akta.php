
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
	<title>Daftar Akta</title>
	<!--<style>
  .row.content {height: 1500px}

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;}
    }

  </style> -->

</head>
<body>
<?php 
include '../bagian/sidebar.php';
include('../bagian/navbar.php');
 ?>
<div class="col-sm-9 main">
<h1 class="page-header">Pendaftaran Akta</h1>
  <form action="" method="post">
      <label for="nm">Nama :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="nama" id="nm" required>
        </div>
      <label for="tl">Tempat Lahir : </label>
        <div class="form-group">
          <input type="text" class="form-control" name="tempatL" id="tl" required>
        </div>
      <label for="tgl">Tanggal : </label>
        <div class="form-group">
          <input type="date" class="form-control"name="tanggalL" id="tgl" required>
        </div>
      <label for="jk">Jenis Kelamin :</label>
        <div class="form-group">
          <select class="form-control" name="gender" id="jk" required>
            <option value="" selected disabled></option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
      <label for="gd">Golongan Darah :</label>
        <div class="form-group">
          <select class="form-control" name="goldarah" id="gd" >
            <option value=""></option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="O">O</option>
            <option value="AB">AB</option>
            <option value="-">-</option>
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
          <input type="text" class="form-control" name="desa" id="kel" required>
        </div>
      <label for="kcmt">Kecamatan :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="kec" id="kcmt" required>
        </div>
      <label for="ag">Agama :</label>
        <div class="form-group">
        <select class="form-control" name="agama" id="ag" required>
          <option value=""></option>
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Budha">Budha</option>
          <option value="Hindu">Hindu</option>
          <option value="Konghucu">Konghucu</option>
          <option value="Katolik">Katolik</option>
        </select>
      </div>
      <label for="stp">Status Perkaiwnan :</label>
        <div class="form-group">
        <select class="form-control" name="status" id="stp" >
          <option value=""></option>
          <option value="Belum Kawin">Belum Kawin</option>
          <option value="Sudah Kawin">Sudah Kawin</option>
        </select>
      </div>
      <label for="pk">Pekerjaan :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="pekerjaan" id="pk" >
        </div>
		<label for="ayah">Ayah :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="nama_ayah" id="ayah" required>
        </div>
		<label for="ibu">ibu :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="nama_ibu" id="ibu" required>
        </div>
		<label for="pendidikan">Pendidikan :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="pendidikan" id="pendidikan">
        </div>
      <TR><TD align="center" colspan="2" height="10%"><input type="submit" class="btn btn-primary" name="simpan" value="Tambah Data"></TD></TR>
<br>
  </form>
  <?php 
  include '../../../config.php';
  	if (isset($_POST['simpan'])) {
      $nama=$_POST['nama'];
      $tempatL=$_POST['tempatL'];
      $tanggalL=$_POST['tanggalL'];
      $gender=$_POST['gender'];
      $goldarah=$_POST['goldarah'];
      $alamat=$_POST['alamat'];
      $rtrw=$_POST['rtrw'];
      $desa=$_POST['desa'];
      $kec=$_POST['kec'];
      $agama=$_POST['agama'];
      $status=$_POST['status'];
      $pekerjaan=$_POST['pekerjaan'];
	  $nama_ayah=$_POST['nama_ayah'];
	  $nama_ibu=$_POST['nama_ibu'];
	  $pendidikan=$_POST['pendidikan'];
    $user=$_SESSION['username'];
    $aktivitas="menambah data akta baru";
	  $sql=$query->prepare("insert into akta (nama, tempatL, tanggalL,gender,goldarah,alamat,rtrw,desa,kec,agama,status_p,pekerjaan,nama_ayah,nama_ibu,pendidikan,create_by) VALUES(:nama,:tempatL,:tanggalL,:gender,:goldarah,:alamat,:rtrw,:desa,:kec,:agama,:status,:pekerjaan,:nama_ayah,:nama_ibu,:pendidikan, :user)");
	  $sql->bindParam(':nama',$nama);
	  $sql->bindParam(':tempatL',$tempatL);
	  $sql->bindParam(':tanggalL',$tanggalL);
	  $sql->bindParam(':gender',$gender);
	  $sql->bindParam(':goldarah',$goldarah);
	  $sql->bindParam(':alamat',$alamat);
	  $sql->bindParam(':rtrw',$rtrw);
	  $sql->bindParam(':desa',$desa);
	  $sql->bindParam(':kec',$kec);
	  $sql->bindParam(':agama',$agama);
	  $sql->bindParam(':status',$status);
	  $sql->bindParam(':pekerjaan',$pekerjaan);
	  $sql->bindParam(':nama_ayah',$nama_ayah);
	  $sql->bindParam(':nama_ibu',$nama_ibu);
	  $sql->bindParam(':pendidikan',$pendidikan);
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
                      window.location = '../list/list_akta.php'; exit();</script>";
            }
	  //
  	}
  ?>
</div>
</body>
</html>