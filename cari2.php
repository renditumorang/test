<?php
	session_start();
	include "koneksi.php";
?>

<html>
<head>
	<title>.: Rekam Medis - Lihat Daftar Pasien :.</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<style>
		td{
			text-align:left;
		}
	</style>
</head>
<body>
<?php
	if(isset($_SESSION["username"]))
	{
?>
	<div id="header">
		<div id="logo">
			<img src="images/img05.png" width="750px;">
		</div>
	</div>
	<div id="menu">
		<div id="drop">
			<table width="100%" id="tablemenu">
				<tr>
					<td width="12%"><a href="utama.php"><font size="5">Home</font></a></td>
					<?php
						$q = mysql_query("select modul.nama_modul, modul.url from hak_akses, modul where hak_akses.level = '".$_SESSION["level"]."' and hak_akses.id_modul=modul.id_modul") or die (mysql_error());
						while($d = mysql_fetch_array($q)){
					?>
						<td width="18%"><a href = "<?php echo $d["url"]; ?>"><font size="5"><?php echo $d ["nama_modul"]; ?></font></a></td>
					<?php
						}
					?>
				</tr>
			</table>
		</div>
	</div>
	<div id="home">
		<div id="tambah_permohonan">
			<form method="post" action="proses.php">
			<table>
   				<tr><td><input type="checkbox" name="bpjs"> No. BPJS </td><td><input type="text" name="no_bpjs"></td></tr>
   				<tr><td><input type="checkbox" name="rm"> No. Rekam Medik </td><td><input type="text" name="no_rm"></td></tr>
   				<tr><td><input type="checkbox" name="nama1"> Nama </td><td><input type="text" name="nama"></td></tr>
   				<tr><td><input type="checkbox" name="tgl"> Tanggal Lahir </td><td><input type="date" name="tgl_lahir"></td></tr>
   				<tr><td></td><td><input type="submit" name="submit" value="Submit"></td></tr>
			</table>
			</form>
<?php
$bagianWhere = "";

if (isset($_POST['bpjs']))
{
   $no_bpjs = $_POST['no_bpjs'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "no_bpjs = '$no_bpjs'";
   }
}

if (isset($_POST['rm']))
{
   $no_rm = $_POST['no_rm'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "no_rm = '$no_rm'";
   }
}

if (isset($_POST['nama1']))
{
   $nama = $_POST['nama'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "nama = '$nama'";
   }
}

if (isset($_POST['tgl']))
{
   $tgl_lahir = $_POST['tgl_lahir'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "tgl_lahir = '$tgl_lahir'";
   }
}

$query = "SELECT * FROM data_pasien WHERE ".$bagianWhere;
$hasil = mysql_query($query);
echo "<table border='1'>";
echo "<tr>
	<td> No. BPJS </td>
	<td> No. Rekam Medik </td>
	<td> Tanggal Registrasi </td>
	<td> Nama </td>
	<td> No. KTP </td>
	<td> Jenis Kelamin </td>
	<td> Tempat Lahir </td>
	<td> Tanggal Lahir </td>
	<td> Status </td>
	<td> Agama </td>
	<td> Alamat </td>
	<td> Kelurahan/Desa </td>
	<td> Kecamatan </td>
	<td> Kota/Kabupaten </td>
	<td> Provinsi </td>
	<td> No. Telepon </td>
	<td> Pekerjaan </td>
	<td> Pendidikan </td>
	<td> Keterangan </td></tr>";

while ($data = mysql_fetch_array($hasil))
{
   echo "<tr><td>".$data['no_bpjs']."</td><td>".$data['no_rm']."</td><td>".$data['tgl_regis']."</td><td>".$data['nama']."</td>
             <td>".$data['no_ktp']."</td><td>".$data['jenis_kelamin']."</td><td>".$data['tempat_lahir']."</td><td>".$data['tanggal_lahir']."</td>
			 <td>".$data['status']."</td><td>".$data['agama']."</td><td>".$data['alamat']."</td><td>".$data['kel_desa']."</td>
			 <td>".$data['kecamatan']."</td><td>".$data['kota_kab']."</td><td>".$data['prrovinsi']."</td><td>".$data['no_telp']."</td>
			 <td>".$data['pekerjaan']."</td><td>".$data['pendidikan']."</td><td>".$data['keterangan']."</td></tr>";
}
echo "</table>";
?>
</body>
</html>