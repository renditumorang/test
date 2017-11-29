<?php
	session_start();
	include "koneksi.php";
	?>
<html>
<head>
	<title>.: Kemenperin - Add User :.</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="js/confirm.js"></script>
	<script type="text/javascript" src="js/validate2.js"></script>
	<link rel="stylesheet" href="jqtransform.css"/>
	<link rel="stylesheet" href="css/style-2.css"/>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
	<script type="text/javascript" src="js/jquery.jqtransform.js" ></script>
<script language="javascript">
	$(function(){
		$('form').jqTransform({
			imgPath:'img/'
		});
	});
</script>
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
		<div id="user">
			<table>
				<tr>
					<td rowspan="3">
						<?php   
						$query_select = "SELECT foto FROM user where id='$_SESSION[id]'";
						$daftar=mysql_query($query_select) or die (mysql_error());
						while($hasil = mysql_fetch_object ($daftar)){
							echo "<img src='foto/".$hasil->foto."' width='120px' height='140px' />"; 
						}
						?>
					</td>
					<td width="150px" height="60px" align="center"><font face="calibri" size="5"><b><?php echo "$_SESSION[nama]" ?></b></font></td>
				</tr>
				<tr>
					<td width="150px" align="center"><i><?php echo "$_SESSION[level]" ?></i></td>
				</tr>
				<tr>
					<td width="150px" align="center" id="logout"><a href="logout.php"><font color="grey">Logout</font></a></td>
				</tr>
			</table>
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
		
			<h3>Create Account User</h3>
			<div id="container1">
			<hr color ="#d1d4d3" size=1 width="95%" align="left"><br>
			<form method="post" action="insert_user.php" name="form" onsubmit = "return cekForm()">
				<fieldset>
					<dl>
						<dt><label>Username</label></dt>
						<dt id="a">:</dt>
						<dd><input type="text" name="username" size="30"></dd>
					</dl>
					<dl>
						<dt><label for="password">Password</label></td>
						<dt id="a">:</dt>
						<dd><input type="password" name="password" id="password" size="30"></dd>
					</dl>
					<dl>
						<dt><label for="pass2">Confirm Password</label></dt>
						<dt id="a">:</dt>
						<dd><input type="password" name="pass2" id="pass2" onKeyUp="checkPass(); return false;" size="30"><span id="confirmMessage" class="confirmMessage"></span></dd>
					</dl>
					<dl>
						<dt><label>Nama Lengkap</label></dt>
						<dt id="a">:</dt>
						<dd><input type="text" name="nama" size="30"></dd>
					</dl>
					<dl>
						<dt><label>Alamat</label></td>
						<dt id="a">:</dt>
						<dd><input type="text" name="alamat" size="30"></dd>
					</dl>
					<dl>
						<dt><label>Nomor Telepon</label></dt>
						<dt id="a">:</dt>
						<dd><input type="text" name="telp" size="30"></dd>
					</dl>
					<dl>
						<dt><label>Email</label></dt>
						<dt id="a">:</dt>
						<dd><input type="text" name="email" size="30"></dd>
					</dl>
					<dl>
                                <dt><input type="image" src="images/button_insert.png" width ="100px" height = "40px"></dt>
								<dt><a href="user_setting.php"><img src="images/button_back.png" width ="100px" height = "40px" /></a></dt>
					</dl>
                  </fieldset>
			</form>
		</div>
		</div>
	</div>
	<div id="footer">
		<center><h4><font color="white">Copyright © 2017 RSU Sri Pamela</font></h4></center>
	</div>
<?php
	}
	else
	{
	?>
		<script language="javascript"> alert ("Anda belum Login!");document.location.href="index.php";
		</script>
	<?php
	}
?>
</body>
</html>