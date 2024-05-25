<?php
include 'koneksi.php';
$id = $_POST["PelangganId"];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$kelamin = $_POST['kelamin'];

$cek_query = mysqli_prepare($koneksi, "SELECT * FROM pelanggan WHERE NomorTelepon = ? AND PelangganId !=?");
mysqli_stmt_bind_param($cek_query,"si",$telepon,$id);
mysqli_stmt_execute($cek_query);
$result=mysqli_stmt_get_result($cek_query);
if(mysqli_num_rows($result)>0){
	?>
	<script language="javascript">
		alert("Nomor Telepon Sudah Terdaftar");
        history.go(-1);
    </script>
	<?php
	exit();
}


$persiapan_query = mysqli_prepare($koneksi, "UPDATE 
pelanggan SET NamaPelanggan=?, Alamat=?, NomorTelepon=?, JenisKelamin=?
WHERE PelangganId=?");

mysqli_stmt_bind_param(
    $persiapan_query,
    "ssssi",
    $nama,
    $alamat,
    $telepon,
    $kelamin,
    $id
);

$eksekusi_query = mysqli_stmt_execute($persiapan_query);
if ($eksekusi_query == false) {
    ?>
    <script language="javascript">
        alert("<?php echo mysqli_stmt_error($persiapan_query); ?>");
        history.go(-1)
    </script>
    <?php
    exit();
}

?>
	<script language="javascript">
		alert("Data Pelanggan Berhasil Diupdate");
        window.location.href = "homekasir.php?pg=forminputpelanggan";
    </script>
<?php
?>