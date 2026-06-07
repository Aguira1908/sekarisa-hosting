<?php

include 'koneksi.php';

$id = $_POST['id'];

$deskripsi = $_POST['deskripsi'];

$referensi = $_POST['referensi'];

$sql = "INSERT INTO revisi
(
id_pesanan,
deskripsi,
link_referensi
)

VALUES
(
:id_pesanan,
:deskripsi,
:referensi
)";

$parse = oci_parse($conn, $sql);

oci_bind_by_name($parse, ":id_pesanan", $id);

oci_bind_by_name($parse, ":deskripsi", $deskripsi);

oci_bind_by_name($parse, ":referensi", $referensi);

oci_execute($parse);

header("Location: pesanan.php");

exit;
?>