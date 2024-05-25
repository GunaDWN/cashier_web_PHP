<!DOCTYPE html>
<?php
include "koneksi.php";
session_start();
if(isset($_SESSION['LoginId']))
{
	echo "<p align=center><font face=cambria 
	color=white> ANDA LOGIN SEBAGAI 
	$_SESSION[Username]</font><p>";
}
else
{
?>
<script language="javascript">
alert("ANDA HARUS LOGIN UNTUK MENGAKSES HALAMAN INI");
document.location="index.php";
</script>
    <?php
	} 
	?>
<html><head><title>home guru</title>
<link href="homekasir.css?v=1.1" rel="stylesheet" 
type="text/css" />
<style>
        body{
            background-image: url(bg2.jpeg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            height: 100%;
			}
		ul {
font-family:Cambria;
font-size: 18px;
margin: 0;
padding: 0;
list-style: none;
}

ul li {
display: block; 
position:relative;
float: left;
}

li ul {
display: none;
}

ul li a {
display: block;
text-decoration: none;
color:beige;
border-top: 1px solid #ffffff;
padding: 5px 15px 5px 15px;
background:black;
margin-left: 1px;
white-space: nowrap;
}

ul li a:hover {
background: #617F8A;
}

li:hover ul {
display: block;
position: absolute;
}
.style1 {
	font-size: 11px;
	font-weight: bold;
}
			</style>
</head>
<body background="bg2.jpeg" text="black" link="grey" 
vlink="grey" font face="Cambria">
<div id="halamanutama">
<div id="header"></div>
<div id="menu">
<ul id="menu">
		
		<li><a href="homekasir.php"><img src="icon2.png" width="50px" height="50px"></a></li>
        <li><a href="homekasir.php?pg=forminputpelanggan" target="_parent">INPUT DATA PELANGGAN</a></li>
      	<li><a href="homekasir.php?pg=forminputproduk" target="_parent">INPUT DATA PRODUK</a></li>
      	</li>

		<li><a href="homekasir.php?pg=formpenjualan">TRANSAKSI PENJUALAN</a></li>
        <li><a href="homekasir.php?pg=riwayatpenjualan">RIWAYAT PENJUALAN</a></li>
		<li><a href="logout.php"><input type="button" value="LOGOUT"></a></li>
</ul>
</div>
<div id="isi">
<p>

<?php
if(isset($_GET['pg'])){
include "" . $_GET['pg'] . ".php";
}
?>

</p></div>
<div id="footer"></div>
</div>
</body></html>
