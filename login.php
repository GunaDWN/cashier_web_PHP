<?php
include 'koneksi.php';
$uname = $_POST['username'];
$pw = $_POST['password'];

$persiapan_query = mysqli_prepare($koneksi,
    "SELECT * FROM login WHERE Username=? and Password=?");
mysqli_stmt_bind_param($persiapan_query,"ss",$u,$p);

$eksekusi_query = mysqli_stmt_execute($persiapan_query);
if($eksekusi_query == false){
?>
	<script language="javascript">
    	alert("<?php echo mysqli_stmt_error($persiapan_query); ?>");
    	history.go(-1)
  	</script>

<?php
  	exit();
}
$hasil = mysqli_stmt_get_result($persiapan_query);
$cekdata = mysqli_fetch_array($hasil, MYSQLI_ASSOC);
$periksa = mysqli_num_rows($hasil);

session_start();
if($periksa != 0)
{
    $_SESSION["LoginId"]    = $cekdata["LoginId"];
    $_SESSION["Username"]   = $cekdata["Username"];
    $_SESSION["Password"]   = $cekdata["Password"];
    header('location:homekasir.php');
}
else
{
?>

<script language="javascript">
    alert('USERNAME/PASSWORD/HAK AKSES ANDA SALAH COBA LAGI!!!!');
    history.go(-1);
</script>

<?php
}
?>