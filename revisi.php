<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>

<head>

    <title>Ajukan Revisi</title>

    <link rel="stylesheet" href="css/style.css?v=999">

</head>

<body>

    <div class="order-container">

        <h2>Ajukan Revisi</h2>

        <p>
            Jelaskan revisi yang diinginkan untuk pesanan ini.
        </p>

        <?php

        $sql = "SELECT * FROM pesanan
        WHERE id_pesanan = :id";

        $parse = oci_parse($conn, $sql);

        oci_bind_by_name($parse, ":id", $id);

        oci_execute($parse);

        $data = oci_fetch_assoc($parse);

        ?>

        <!-- DETAIL PESANAN -->
        <div class="revisi-detail">

            <p>
                <b>Nama:</b>
                <?php echo $data['NAMA']; ?>
            </p>

            <p>
                <b>Layanan:</b>
                <?php echo $data['LAYANAN']; ?>
            </p>

            <p>
                <b>Status:</b>
                <?php echo $data['STATUS']; ?>
            </p>

        </div>

        <!-- FORM -->
        <form action="proses_revisi.php" method="POST">

            <input
                type="hidden"
                name="id"
                value="<?php echo $id; ?>">

            <!-- DESKRIPSI -->
            <label>Deskripsi Revisi</label>

            <textarea
                name="deskripsi"
                placeholder="Contoh: bagian transisi terlalu cepat, warna kurang warm..."
                required></textarea>

            <!-- LINK -->
            <label>Link Referensi (Optional)</label>

            <input
                type="text"
                name="referensi"
                placeholder="https://youtube.com/...">

            <button type="submit">

                Kirim Revisi

            </button>

            <div class="back-wrapper">

                <a
                    href="pesanan.php"
                    class="back-home">

                    ← Kembali ke Track Order

                </a>

            </div>

        </form>

    </div>

</body>

</html>