<?php

session_start();

include 'koneksi.php';

$email = $_POST['email'];

$password = $_POST['password'];

$sql = "SELECT * FROM users
WHERE email = :email
AND password = :password";

$parse = oci_parse($conn, $sql);

oci_bind_by_name($parse, ":email", $email);

oci_bind_by_name($parse, ":password", $password);

oci_execute($parse);

$data = oci_fetch_assoc($parse);

if ($data) {

    $_SESSION['id_user'] = $data['ID_USER'];

    $_SESSION['role'] = strtolower(trim($data['ROLE']));
    if ($_SESSION['role'] == 'admin') {

        header("Location: admin.php");
    } else {

        header("Location: index.php");
    }
} else {

    header("Location: login.php?error=1");
}

exit;
