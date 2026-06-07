<?php

include 'koneksi.php';

$id = $_POST['id'];

$status = $_POST['status'];

$hasil = $_POST['hasil_video'];

$sql = "UPDATE pesanan

SET
status = :status,
hasil_video = :hasil

WHERE id_pesanan = :id";

$parse = oci_parse($conn, $sql);

oci_bind_by_name($parse, ":status", $status);

oci_bind_by_name($parse, ":hasil", $hasil);

oci_bind_by_name($parse, ":id", $id);

oci_execute($parse);

header("Location: admin.php");

exit;
