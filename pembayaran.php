<?php

include 'koneksi.php';

$total = $_GET['total'] ?? 0;

$nama = $_GET['nama'] ?? '';

$idPesanan = $_GET['id_pesanan'] ?? 0;

// CEK BIAR GAK DOUBLE INSERT
$cek = "SELECT * FROM pembayaran
WHERE id_pesanan = :id";

$parseCek = oci_parse($conn, $cek);

oci_bind_by_name($parseCek, ":id", $idPesanan);

oci_execute($parseCek);

$data = oci_fetch_assoc($parseCek);

// INSERT PEMBAYARAN
if (!$data && $idPesanan != 0) {

    $metode = "DANA";

    $status = "Menunggu Pembayaran";

    $sql = "INSERT INTO pembayaran (

    id_pesanan,
    metode,
    total_bayar,
    status_pembayaran,
    tanggal_bayar

    )

    VALUES (

    :id_pesanan,
    :metode,
    :total_bayar,
    :status_pembayaran,
    SYSDATE

    )";

    $parse = oci_parse($conn, $sql);

    oci_bind_by_name($parse, ":id_pesanan", $idPesanan);

    oci_bind_by_name($parse, ":metode", $metode);

    oci_bind_by_name($parse, ":total_bayar", $total);

    oci_bind_by_name($parse, ":status_pembayaran", $status);

    oci_execute($parse);
}

$pesan = "Halo admin, saya sudah melakukan pembayaran.%0A%0ANama: $nama%0ATotal Bayar: Rp " . number_format($total);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Pembayaran</title>

    <link rel="stylesheet" href="css/style.css?v=999">

</head>

<body>

    <div class="payment-box">

        <h2>Pembayaran</h2>

        <p>

            Nama:
            <b>

                <?php echo $nama; ?>

            </b>

        </p>

        <p>

            Total Bayar:

            <b>

                Rp <?php echo number_format($total); ?>

            </b>

        </p>

        <div class="payment-detail">

            <p>Transfer ke:</p>

            <h3>DANA - 082162961621</h3>

            <span>a.n Juarajasa.id</span>

        </div>

        <div class="payment-note">

            Setelah transfer, kirim bukti pembayaran ke WhatsApp admin.

        </div>

        <a

            href="https://wa.me/6282162961621?text=<?php echo $pesan; ?>"

            target="_blank"

            class="btn payment-btn">

            Kirim Bukti ke WhatsApp

        </a>

        <div class="back-wrapper">

            <a href="index.php" class="back-home">

                ← Kembali ke Home

            </a>

        </div>

    </div>

</body>

</html>