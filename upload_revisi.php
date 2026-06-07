<?php

include 'koneksi.php';

$id = $_POST['id_revisi'];

$hasil = $_POST['hasil_revisi'];

$sql = "UPDATE revisi

SET hasil_revisi = :hasil

WHERE id_revisi = :id";

$parse = oci_parse($conn, $sql);

oci_bind_by_name($parse, ":hasil", $hasil);

oci_bind_by_name($parse, ":id", $id);

oci_execute($parse);

header("Location: admin.php");

exit;
