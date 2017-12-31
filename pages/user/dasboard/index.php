
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
include('../bagian/navbar.php');
include('../bagian/sidebar.php');
include '../../../config.php';
$sql_a=$query->prepare("select count(*) as jumlah from akta ");
$sql_a->execute();
$data_akta=$sql_a->fetch();
$sql_k=$query->prepare("select count(*) as jumlah from ktp ");
$sql_k->execute();
$data_ktp=$sql_k->fetch();
$sql_kk=$query->prepare("select count(*) as jumlah from kartu_k ");
$sql_kk->execute();
$data_kk=$sql_kk->fetch();
?>
<div class="col-sm-9 main">
	<div class="container-fluid">
		<h1 class="page-header">Dasboard</h1>
		<div class="row">
          <div class="col-sm-4 col-md-4">
            <div class="panel panel-primary">
              <div class="panel-body">
                <h3 style="text-align: center;">Data KTP</h3>
                <p style="text-align: center;">
                  Total ada <?php echo $data_ktp['jumlah']; ?> data KTP.
                </p>
                <button class="btn btn-primary btn-block"><a style="color:white; text-decoration:none;" href="../list/list_ktp.php">Lihat Detail</a></button>
              </div>
            </div>
          </div>
  <div class="col-sm-4 col-md-4">
    <div class="panel panel-primary">
      <div class="panel-body">
        <h3 style="text-align: center;">Data Akta</h3>
        <p style="text-align: center;">
          Total ada <?php echo $data_akta['jumlah']; ?> data Akta.
        </p>
        <button class="btn btn-primary btn-block"><a <a style="color:white; text-decoration:none;" href="../list/list_akta.php">Lihat Detail</a></button>
      </div>
    </div>
  </div>
  <div class="col-sm-4 col-md-4">
    <div class="panel panel-primary">
      <div class="panel-body">
        <h3 style="text-align: center;">Data KK</h3>
        <p style="text-align: center;">
          Total ada <?php echo $data_kk['jumlah']; ?> data Kartu Keluarga.
        </p>
        <button class="btn btn-primary btn-block"><a <a style="color:white; text-decoration:none;" href="../list/list_kk.php">Lihat Detail</a></button>
      </div></div>
    </div>
  </div>
      
	</div>
</div>
</body>
</html>