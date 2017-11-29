<?php
	include "koneksi.php";
	
	if($koneksi){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$nama=$_POST['nama'];
		$alamat=$_POST['alamat'];
		$telp=$_POST['telp'];
		$email=$_POST['email'];
		
		$SQL ="insert into user values( null, '$username', MD5('$password'), '$nama', '$alamat', '$telp', '$email', 'User', 'user.jpg')";
		mysql_query ($SQL, $koneksi) or die ("Proses insert data gagal!");
		?>
		<script language="javascript"> alert ("Data Berhasil Terinput !");
		document.location.href = "lihat_user.php";</script>
		<?php
		}
?>
		
		