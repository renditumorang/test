<?php
	session_start();
	include "koneksi.php";
	
	$username = mysql_real_escape_string($_POST["username"]);
	$password = mysql_real_escape_string($_POST["password"]);
	
	$query = mysql_query("SELECT * FROM user WHERE username = '".$username."' AND password =
	MD5('".$password."')") or die(mysql_error());
	if(mysql_num_rows($query) == 1)
	{
		$fetch = mysql_fetch_array($query);
		
		$_SESSION["username"] = $username;
		$_SESSION["password"] = $password;
		$_SESSION["nama"] = $fetch["nama"];
		$_SESSION["nama_database"] = $fetch["nama_database"];
		$_SESSION["id"] = $fetch["id"];
		$_SESSION["level"] = $fetch["level"];
		
		?>

		<script language="javascript">document.location.href = "utama.php";</script>

		<?php
	}
	else
	{
		?>
		<script language="javascript"> alert ("Username atau password anda salah!");
		document.location.href = "index.php";</script>
		<?php
	}
?>
	