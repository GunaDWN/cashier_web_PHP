<?php
if(basename($_SERVER["PHP_SELF"]) != "homekasir.php") {
?>
  <script language="javascript">
    alert("FILE HARUS DIAKSES OLEH HOMEKASIR.PHP");
    document.location = "homekasir.php";
  </script>
<?php
  exit();
}
if (isset($_SESSION['LoginId'])) {
  echo "<h2 align=center><B><font face=cambria 
  color=black size=5>riwayat penjualan</font></B></h2><p>";
} else {
?>
<script language="javascript">
alert("ANDA HARUS LOGIN DULU UNTUK BISA MENGAKSES HALAMAN INI");
document.location = "index.php";
</script>
<?php
  exit();
}

?>
<html><head><title>FORM DATA RIWAYAT PENJUALAN</title>
<link href="index.css" rel="stylesheet" type="text/css">
</head>
<div align="center"><body>
<fieldset><legend>DATA RIWAYAT PENJUALAN</legend>
<table border="1" cellspacing="0" cellpadding="10">
<tr>
<td><div align="center"><strong>NO</strong></div></td>
<td><div align="center"><strong>TANGGAL PENJUALAN
</strong></div></td>
<td><div align="center"><strong>PELANGGAN</strong></div></td>
<td><div align="center"><strong>TOTAL HARGA</strong></div></td>
<td><div align="center"><strong>PEMBAYARAN</strong></div></td>
<td><div align="center"><strong>KEMBALIAN</strong></div></td>
<td><div align="center"></div></td>
</tr>
<?php
$no = 1;
$ambil = mysqli_query($koneksi, "SELECT * FROM penjualan 
LEFT JOIN pelanggan ON pelanggan.PelangganId = 
penjualan.PelangganId");
while ($array = mysqli_fetch_array($ambil, MYSQLI_ASSOC)) {
?>
<tr><td><div align="center"><?php echo "$no";
$no++; ?></div></td>
<td><div align="center"><?php echo 
"$array[TanggalPenjualan]"; ?></div></td>
<td><div align="center"><?php echo
"$array[NamaPelanggan]"; ?></div></td>
<td><div align="center"><?php echo 
"$array[TotalHarga]"; ?></div></td>
<td><div align="center"><?php echo 
"$array[Pembayaran]"; ?></div></td>
<td><div align="center"><?= $array['Pembayaran'] - 
$array['TotalHarga']; ?></div></td>
<td><div align="center">
<a href="homekasir.php?pg=detailpenjualan&idnya=
<?php echo $array['PenjualanId']; ?>" >DETAIL</a></div></td>
</tr>
        <?php
        }
        ?>
</table></fieldset></body></div></html>