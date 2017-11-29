<html>
<body>
<?php
include "koneksi.php";
	if($koneksi){
	$no=$_GET['no'];
	
	$SQL = "DELETE FROM daftar WHERE no='$no'";
	$hasil_query = mysql_query($SQL, $koneksi);
	if ($hasil_query)
	?>
		<script language="javascript">
		document.location.href = "lihat_permohonan.php";</script>
	<?php
	}
?>
</body>
</html>