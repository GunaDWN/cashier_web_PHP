<?php
include 'koneksi.php';
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$kelamin = $_POST['kelamin'];

$cek_query = mysqli_prepare($koneksi, "SELECT * FROM pelanggan WHERE NomorTelepon=?");
mysqli_stmt_bind_param($cek_query,"s",$telepon);
mysqli_stmt_execute($cek_query);
$result=mysqli_stmt_get_result($cek_query);
if(mysqli_num_rows($result)>0){
	?>
	<script language="javascript">
		alert("Nomor Telepon Sudah Terdaftar, Gunakan Nomor Lain");
        history.go(-1);
    </script>
	<?php
	exit();
}

$persiapan_query = mysqli_prepare(
	$koneksi,
	"INSERT INTO pelanggan(NamaPelanggan,Alamat,NomorTelepon,JenisKelamin) 
VALUES(?, ?, ?,?)"
);
mysqli_stmt_bind_param(
	$persiapan_query,
	"ssss",
	$nama,
	$alamat,
	$telepon,
	$kelamin
);
$eksekusi_query = mysqli_stmt_execute($persiapan_query);

if ($eksekusi_query == false) {
	?>
	<script language="javascript">
		alert("<?php echo mysqli_stmt_error($persiapan_query); ?>");
		history.go(-1) </script>
	<?php
	exit();
}

?>
	<script language="javascript">
		alert("Data Pelanggan Berhasil Ditambahkan");
        history.go(-1)
    </script>
<?php
?>