<?php

session_start();

include 'koneksi.php';

$idUser = $_SESSION['id_user'];

$layanan = $_POST['layanan'];
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$deskripsi = $_POST['deskripsi'];
$link = $_POST['link'];

$durasi = $_POST['durasi'] ?? 0;
$jumlah_foto = $_POST['jumlah_foto'] ?? 0;

$fileName = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];

$path = "";

if ($fileName != "") {

    $path = "uploads/" . time() . "_" . $fileName;

    move_uploaded_file($tmp, $path);
}

$total = 0;

if ($layanan == "Video") {

    $total = $durasi * 50000;
} else if ($layanan == "Photo") {

    $total = $jumlah_foto * 20000;
}

$sql = "INSERT INTO pesanan
(
id_user,
nama,
hp,
layanan,
durasi,
jumlah_foto,
deskripsi,
file_upload,
link_drive,
total,
status
)

VALUES
(
:id_user,
:nama,
:hp,
:layanan,
:durasi,
:jumlah_foto,
:deskripsi,
:file_upload,
:link_drive,
:total,
:status
)";

$parse = oci_parse($conn, $sql);

$status = "Pending";

oci_bind_by_name($parse, ":id_user", $idUser);

oci_bind_by_name($parse, ":nama", $nama);

oci_bind_by_name($parse, ":hp", $hp);

oci_bind_by_name($parse, ":layanan", $layanan);

oci_bind_by_name($parse, ":durasi", $durasi);

oci_bind_by_name($parse, ":jumlah_foto", $jumlah_foto);

oci_bind_by_name($parse, ":deskripsi", $deskripsi);

oci_bind_by_name($parse, ":file_upload", $path);

oci_bind_by_name($parse, ":link_drive", $link);

oci_bind_by_name($parse, ":total", $total);

oci_bind_by_name($parse, ":status", $status);

oci_execute($parse);

// AMBIL ID PESANAN TERAKHIR
$sqlLast = "SELECT MAX(id_pesanan) AS ID
FROM pesanan";

$parseLast = oci_parse($conn, $sqlLast);

oci_execute($parseLast);

$dataLast = oci_fetch_assoc($parseLast);

$idPesanan = $dataLast['ID'];

header("Location: pembayaran.php?total=$total&nama=$nama&id_pesanan=$idPesanan");

exit;
