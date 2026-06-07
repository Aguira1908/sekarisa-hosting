<?php

session_start();

if (!isset($_SESSION['id_user'])) {

    echo "

    <script>

    alert('Login dulu untuk melihat track order');

    window.location='login.php';

    </script>

    ";

    exit;
}

include 'koneksi.php';

?>

<!DOCTYPE html>
<html>

<head>
    <title>Track Order</title>

    <link rel="stylesheet" href="css/style.css?v=999">
</head>

<body>

    <div class="track-container">

        <h2>Track Order</h2>

        <p class="track-subtitle">
            Pantau progress pesanan editing secara realtime.
        </p>

        <?php

        $idUser = $_SESSION['id_user'];

        $sql = "SELECT * FROM pesanan

        WHERE id_user = :id_user

        ORDER BY id_pesanan DESC";

        $parse = oci_parse($conn, $sql);

        oci_bind_by_name(
            $parse,
            ":id_user",
            $idUser
        );

        oci_execute($parse);

        while ($p = oci_fetch_assoc($parse)) {

            $statusClass = "pending";

            if ($p['STATUS'] == "Diproses")
                $statusClass = "proses";

            if ($p['STATUS'] == "Selesai")
                $statusClass = "selesai";

        ?>

            <!-- CARD -->
            <div class="track-card">

                <div class="track-top">

                    <h3>
                        <?php echo $p['LAYANAN']; ?>
                    </h3>

                    <span class="status <?php echo $statusClass; ?>">

                        <?php echo $p['STATUS']; ?>

                    </span>

                </div>

                <div class="track-detail">

                    <p>
                        <b>Nama:</b>
                        <?php echo $p['NAMA']; ?>
                    </p>

                    <p>
                        <b>Layanan:</b>
                        <?php echo $p['LAYANAN']; ?>
                    </p>

                    <p>
                        <b>Total:</b>
                        Rp <?php echo number_format($p['TOTAL']); ?>
                    </p>

                    <div class="track-buttons">

                        <?php if (!empty($p['HASIL_VIDEO'])) { ?>

                            <a
                                href="<?php echo $p['HASIL_VIDEO']; ?>"
                                target="_blank"
                                class="btn">

                                Download Video

                            </a>

                        <?php } ?>

                        <?php

                        $sqlRev = "SELECT * FROM revisi
WHERE id_pesanan = :id
ORDER BY id_revisi DESC";

                        $parseRev = oci_parse($conn, $sqlRev);

                        $idPesanan = $p['ID_PESANAN'];

                        oci_bind_by_name($parseRev, ":id", $idPesanan);

                        oci_execute($parseRev);

                        $rev = oci_fetch_assoc($parseRev);

                        if (
                            $rev &&
                            !empty($rev['HASIL_REVISI'])
                        ) {

                        ?>

                            <a
                                href="<?php echo $rev['HASIL_REVISI']; ?>"
                                target="_blank"
                                class="btn-secondary">

                                Lihat Hasil Revisi

                            </a>

                            <?php

                        } else {

                            if (!empty($p['HASIL_VIDEO'])) {

                            ?>

                                <a
                                    href="revisi.php?id=<?php echo $p['ID_PESANAN']; ?>"
                                    class="btn-secondary">

                                    Ajukan Revisi

                                </a>

                        <?php

                            }
                        }

                        ?>

                    </div>

                </div>

            </div>

        <?php } ?>

        <div class="back-wrapper">

            <a href="index.php" class="back-home">
                ← Kembali ke Home
            </a>

        </div>

    </div>

</body>

</html>