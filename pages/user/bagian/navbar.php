<?php 
session_start();
if (!isset($_SESSION['username'])) {
  // jika user belum login
  header('Location: ../../login');
  exit();
}
?>
<nav class="navbar fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <!--<a class="navbar-brand" href="../dasbor"><h3>Aplikasi Pendaftran</h3></a>-->
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><p class="navbar-text">Hai, <?php echo $_SESSION['username']." "  ?><a href="../../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></p></li>
        </ul>
      </div>
 <?php //include 'sidebar.php'; ?>
  </nav>