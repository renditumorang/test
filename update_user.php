<?php
include "koneksi.php";
$id=$_POST['id'];
$username=$_POST['username'];
$nama = $_POST['nama']; 
$alamat=$_POST['alamat'];
$telp=$_POST['telp'];
$email=$_POST['email'];

	$myqry="UPDATE user SET username='$username',nama='$nama', alamat='$alamat',telp='$telp', email='$email' WHERE id='$id' LIMIT 1";
	mysql_query($myqry) or die(mysql_error());
	?>
		<script language="javascript">
		document.location.href = "lihat_user.php";</script>
	<?php
?>