<?php

if (session_status() == PHP_SESSION_NONE) {

  session_set_cookie_params(0);

  session_start();
}

// === KONFIGURASI ORACLE ===
$username = "si_sekarisa";
$password = "PassSekarisa123";
$host     = "127.0.0.2";
$port     = "1521";
$service  = "xepdb1";

$conn = oci_connect(
  $username,
  $password,
  "$host:$port/$service"
);

if (!$conn) {

  $e = oci_error();

  die("Koneksi gagal: " . $e['message']);
}
