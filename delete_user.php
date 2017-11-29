<html>
<body>
<?php
include "koneksi.php";
	if($koneksi){
	$id=$_GET['id'];
	
	$SQL = "DELETE FROM user WHERE id='$id'";
	$hasil_query = mysql_query($SQL, $koneksi);
	if ($hasil_query)
	?>
		<script language="javascript"> alert ("User Berhasil Dihapus");
		document.location.href = "lihat_user.php";</script>
	<?php
	}
?>
</body>
</html>