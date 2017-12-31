
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
		
    

 ?>
<div class="col-sm-9 main">
    <div class="container-fluid">
        <h1 class="page-header">Pendaftaran KTP</h1>
        <form method="post" action="" enctype="multipart/form-data">
            <?php $list=$query->prepare("select * from akta where tempo=0");
$list->execute();
$data=$list->fetchAll(); ?>
        <div class="form-group">
        <label for="nk">Nik :</label>
        <select class="form-control selectlive" name="nik" required>
        <option value="" selected disabled>- pilih -</option>
        <?php foreach ($data as $value) : ?>
        <option value="<?php echo $value['nik'] ?>">
          <?php echo $value['nama'] ?> (NIK: <?php echo $value['nik'] ?>)
        </option>
        <?php endforeach ?>
      </select>

    </div>
    <div class="form-group">
        <label for="foto">Foto : </label>
        <input type="file" name="myimage" class="form-control" id="foto">
    </div>
    <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
        </form>
        <?php 
        if(isset($_POST['simpan']))
 {
  $nik = $_POST['nik'];// user name
  $user=$_SESSION['username'];
  $aktivitas="menambah data ktp dengan nik ".$nik;
  $imgFile = $_FILES['myimage']['name'];
  $tmp_dir = $_FILES['myimage']['tmp_name'];
  $imgSize = $_FILES['myimage']['size'];
  
  $cek=$query->prepare("select * from ktp where nik=:nik");
  $cek->bindParam(':nik',$nik);
  $cek->execute();
  $cek_ktp=$cek->fetch();

  if($cek_ktp>0){
   echo"<script>alert('Nik Sudah Terpakai'); exit();</script>";
  }
  else if(empty($imgFile)){
   echo"<script>alert('Tolong Masukan Foto'); exit();</script>";
  }
  else
  {
   $upload_dir = '../../../foto-ktp/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
  
   // rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;
    
   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 5000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$userpic);
     $stmt = $query->prepare("INSERT INTO ktp (nik,gambar,create_by) VALUES(:nik, :upic, :user)");
   $stmt->bindParam(':nik',$nik);
   $stmt->bindParam(':upic',$userpic);
   $stmt->bindParam(':user',$user);
   $hasil=$stmt->execute();
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
    else{
     echo"<script>alert('File Terlalu Besar'); exit();</script>";
    }
   }
   else{
    echo"<script>alert('Hanya File jpeg, jpg, png yang diperbolehkan'); exit();</script>";  
   }
  }
  
  
  // if no error occured, continue ....
   
 }
         ?>
    </div>
</div>
</body>
</html>