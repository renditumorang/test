<?php
	$hos = "localhost";
	$uname = "root";
	$pswd= "pidel12345";
	$nama_db = "medical_record";
	$koneksi = mysql_connect($hos,$uname,$pswd) or
die ("Gagal terhubung ke server MySQL!");

	mysql_select_db($nama_db, $koneksi) or die("Gagal memilih
database!");
?>