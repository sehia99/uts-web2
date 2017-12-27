<?php 
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'web2');

	try {
			$query=null;
			$query=new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD);
			$query->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		print "koneksi atau query salah".$e->getMessage()."<br/>";
		die();
	}