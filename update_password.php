<?php
session_start();
include "koneksi.php";
if(isset($_SESSION["username"]))
	{
$id=$_POST['id'];
$user=$_POST['username'];
$pass1 = $_POST['pass1']; 
$pass=$_POST['password'];
$query_select = "SELECT * FROM user WHERE id='$_SESSION[id]'";
				$daftar=mysql_query($query_select) or die (mysql_error());
				while($hasil = mysql_fetch_object ($daftar)){

if($_SESSION["username"] == $user and $_SESSION["password"] == $pass1){

	$myqry="UPDATE user SET password=MD5('$pass') WHERE id='$id' LIMIT 1";
	mysql_query($myqry) or die(mysql_error());
	?>
		<script language="javascript">
		document.location.href = "lihat_user.php";</script>
	<?php
	}
	else{
	?>
	<input type="hidden" name="id" value="<?php echo  $hasil->id?>">
		<script language="javascript"> alert ("Username atau Password Lama salah, Masukan kembali Username dan Password anda sebenarnya !");
		document.location.href = "edit_password.php?id=<?php echo  $hasil->id?>";</script>
	<?php
	}
	}
	}
	else
	{
	?>
		<script language="javascript"> alert ("Anda belum Login!");document.location.href="index.php";
		</script>
	<?php
	}
?>
