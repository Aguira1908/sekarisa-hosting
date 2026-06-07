<?php

session_start();

include 'koneksi.php';

$email = $_POST['email'];

$idUser = $_SESSION['id_user'];

$sql = "INSERT INTO newsletter
(
email,
id_user
)

VALUES
(
:email,
:id_user
)";

$parse = oci_parse($conn, $sql);

oci_bind_by_name($parse, ":email", $email);

oci_bind_by_name($parse, ":id_user", $idUser);

oci_execute($parse);

header("Location: about.php");

exit;
