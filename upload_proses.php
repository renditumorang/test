<?php
	session_start();
	include "koneksi.php";
	
	$lokasi_file = $_FILES['foto']['tmp_name'];
	$tipe_file   = $_FILES['foto']['type'];
	$nama_file   = $_FILES['foto']['name'];
	$ukuran_file = $_FILES['foto']['size'];
	$direktori   = "foto/$nama_file";
	if ($ukuran_file > $_POST[ukuran_maks_file]){
  echo "Upload Gagal !!! <br>
        Ukuran file <b>$nama_file</b> : $ukuran_file bytes<br>
        Ukuran file tidak boleh > 500000 bytes (500 Kb) <br>";
}
else{
	
	if ($tipe_file != "image/gif" AND 
    $tipe_file != "image/jpeg" AND
    $tipe_file != "image/pjpeg" AND 
    $tipe_file != "image/png"){
  ?>
				<script language="javascript">
					alert("Upload Gagal. Tipe File Yang Boleh DiUpload : gif, jpg dan png !");
					document.location.href="edit_gambar.php";
				</script>
			<?php
}
	else{
		move_uploaded_file($lokasi_file, $direktori);
		
		$sql = "UPDATE user SET foto = '$nama_file' WHERE id = ".$_SESSION["id"];
		$aksi = mysql_query($sql) or die (mysql_error());
		
		if(!$aksi){
			?>
				<script language="javascript">
					alert("Maaf, tidak berhasil masukan gambar");
					document.location.href="edit_gambar.php";
				</script>
			<?php
		}
		else{
			?>
				<script language="javascript">
					document.location.href="utama.php";
				</script>
			<?php
		}
	}
	}
?>
	