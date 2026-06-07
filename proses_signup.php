<?php

include 'koneksi.php';

$email = $_POST['email'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

if ($password != $confirm) {

    header("Location: signup.php?error=1");
    exit;
}

$sql = "INSERT INTO users
(email, nama, password)
VALUES
(:email, :nama, :password)";

$parse = oci_parse($conn, $sql);

oci_bind_by_name($parse, ":email", $email);
oci_bind_by_name($parse, ":nama", $nama);
oci_bind_by_name($parse, ":password", $password);

oci_execute($parse);

header("Location: login.php");
exit;
