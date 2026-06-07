<?php

include 'koneksi.php';

$email = $_POST['email'];

$password = $_POST['password'];

$sql = "UPDATE users

SET password = :password

WHERE email = :email";

$parse = oci_parse($conn, $sql);

oci_bind_by_name($parse, ":password", $password);

oci_bind_by_name($parse, ":email", $email);

$result = oci_execute($parse);

if ($result) {

    echo "

    <script>

    alert('Password berhasil direset');

    window.location='login.php';

    </script>

    ";
} else {

    echo "

    <script>

    alert('Reset password gagal');

    window.location='forgot.php';

    </script>

    ";
}
