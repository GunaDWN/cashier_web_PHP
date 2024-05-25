<?php
include 'koneksi.php';
$id = $_POST["ProdukId"];
$produk = $_POST['produk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$cek_query = mysqli_prepare($koneksi, "SELECT * FROM produk WHERE NamaProduk=? AND ProdukId != ?");
mysqli_stmt_bind_param($cek_query,"si",$produk, $id);
mysqli_stmt_execute($cek_query);
$result=mysqli_stmt_get_result($cek_query); 
if(mysqli_num_rows($result)>0){
	?>
	<script language="javascript">
		alert("Produk Sudah Ada, Edit Atau Tambahkan Produk Lain");
        history.go(-1);
    </script>
	<?php
	exit();
}

if($stok<0){
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
    "UPDATE produk SET NamaProduk=?, Harga=?, 
Stok=? WHERE ProdukId=?"
);
mysqli_stmt_bind_param(
    $persiapan_query,
    "sdii",
    $produk,
    $harga,
    $stok,
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
		alert("Data Produk Berhasil Ditambahkan");
        window.location.href = "homekasir.php?pg=forminputproduk";
    </script>
<?php
?>