<?php
include 'koneksi.php';
$produk = $_POST['produk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$cek_query = mysqli_prepare($koneksi, "SELECT * FROM produk WHERE NamaProduk=?");
mysqli_stmt_bind_param($cek_query, "s", $produk);
mysqli_stmt_execute($cek_query);
$result = mysqli_stmt_get_result($cek_query);
if (mysqli_num_rows($result) > 0) {
	?>
	<script language="javascript">
		alert("Produk Sudah Ada, Edit Atau Tambahkan Produk Lain");
		history.go(-1);
	</script>
	<?php
	exit();
}

if($harga<0){
	?>
    <script language="javascript">
        alert("Harga Tidak Boleh Minus");
        history.go(-1)
    </script>
    <?php
    exit();
}

if ($stok < 0) {
	?>
	<script language="javascript">
		alert("Stok Tidak Boleh Minus");
		history.go(-1)
	</script>
	<?php
	exit();
}

$persiapan_query = mysqli_prepare(
	$koneksi,
	"INSERT INTO produk(NamaProduk,Harga,Stok) 
VALUES(?, ?, ?)"
);
mysqli_stmt_bind_param(
	$persiapan_query,
	"sdi",
	$produk,
	$harga,
	$stok
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
		alert("Data Produk Berhasil Ditambahkan");
        history.go(-1)
    </script>
<?php
?>