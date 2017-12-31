<?php 
session_start();
if (!isset($_SESSION['username'])) {
  // jika user belum login
  header('Location: ../../login');
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
include '../../../config.php';
	$aktivitas="mengembalikan data ktp dengan nik ".$_GET['nik'];
	$sql=$query->prepare("update ktp set tempo=0 where nik=:nik");
	$sql->bindParam(':nik',$_GET['nik']);
	$hasil=$sql->execute();
	if (!$hasil) {
              die("Salah SQL $simpan");
            }else{
              $log=$query->prepare("insert into log (username,aktivitas)values(:username,:aktivitas)");
              $log->bindParam(':username',$_SESSION['username']);
              $log->bindParam(':aktivitas',$aktivitas);
              $log->execute();
                  echo"<script>alert('Data Telah Dikembalikan');
                      window.location = '../list/list_ktp.php'; exit();</script>";
            }
?>
</body>
</html>