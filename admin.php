<?php
session_start();
include 'koneksi.php';

/* CEK ROLE ADMIN */
if (
    !isset($_SESSION['role']) ||
    strtolower(trim($_SESSION['role'])) != 'admin'
) {

    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="css/style.css?v=999">
</head>

<body class="admin-page">

    <div class="admin-container">

        <!-- HEADER -->
        <div class="admin-header">

            <div>
                <h1>Dashboard Admin</h1>
                <p>Kelola pesanan dan revisi client.</p>
            </div>

            <a href="logout.php" class="logout-btn">
                Logout
            </a>

        </div>

        <!-- STATS -->
        <div class="stats">

            <!-- TOTAL ORDER -->
            <div class="stat-card">

                <h3>Total Order</h3>

                <h1>

                    <?php

                    $sqlTotal = "SELECT COUNT(*) AS TOTAL FROM pesanan";

                    $parseTotal = oci_parse($conn, $sqlTotal);

                    oci_execute($parseTotal);

                    $total = oci_fetch_assoc($parseTotal);

                    echo $total['TOTAL'];

                    ?>

                </h1>

            </div>

            <!-- TOTAL REVISI -->
            <div class="stat-card">

                <h3>Total Revisi</h3>

                <h1>

                    <?php

                    $sqlRevisi = "SELECT COUNT(*) AS TOTAL FROM revisi";

                    $parseRevisi = oci_parse($conn, $sqlRevisi);

                    oci_execute($parseRevisi);

                    $totalRevisi = oci_fetch_assoc($parseRevisi);

                    echo $totalRevisi['TOTAL'];

                    ?>

                </h1>

            </div>

        </div>

        <!-- PESANAN -->
        <div class="admin-card">

            <h2>Data Pesanan</h2>

            <table>

                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Layanan</th>
                    <th>Status</th>
                    <th>File</th>
                    <th>Link</th>
                    <th>Aksi</th>
                </tr>

                <?php

                $sql = "SELECT * FROM pesanan
                ORDER BY id_pesanan DESC";

                $parse = oci_parse($conn, $sql);

                oci_execute($parse);

                while ($p = oci_fetch_assoc($parse)) {

                    $statusClass = "pending";

                    if ($p['STATUS'] == "Diproses")
                        $statusClass = "proses";

                    if ($p['STATUS'] == "Editing")
                        $statusClass = "editing";

                    if ($p['STATUS'] == "Rendering")
                        $statusClass = "rendering";

                    if ($p['STATUS'] == "Selesai")
                        $statusClass = "selesai";

                    echo "<tr>";

                    echo "<td>" . $p['ID_PESANAN'] . "</td>";

                    echo "<td>" . $p['NAMA'] . "</td>";

                    echo "<td>" . $p['LAYANAN'] . "</td>";

                    echo "<td>
                    <span class='status $statusClass'>
                    " . $p['STATUS'] . "
                    </span>
                    </td>";

                    // FILE
                    if (!empty($p['FILE_UPLOAD'])) {

                        echo "<td>
                        <a href='" . $p['FILE_UPLOAD'] . "' target='_blank'>
                        Lihat
                        </a>
                        </td>";
                    } else {

                        echo "<td>-</td>";
                    }

                    // LINK
                    if (!empty($p['LINK_DRIVE'])) {

                        echo "<td>
                        <a href='" . $p['LINK_DRIVE'] . "' target='_blank'>
                        Buka
                        </a>
                        </td>";
                    } else {

                        echo "<td>-</td>";
                    }

                    // AKSI
                    echo "<td>

                    <form action='update_status.php' method='POST'>

                    <input
                    type='hidden'
                    name='id'
                    value='" . $p['ID_PESANAN'] . "'>

                    <select name='status'>

                    <option value='Pending'>Pending</option>

                    <option value='Diproses'>Diproses</option>

                    <option value='Editing'>Editing</option>

                    <option value='Rendering'>Rendering</option>

                    <option value='Selesai'>Selesai</option>

                    </select>

                    <br><br>

                    <input
                    type='text'
                    name='hasil_video'
                    placeholder='Link Google Drive'>

                    <br><br>

                    <button
                    type='submit'
                    class='btn'>

                    Update

                    </button>

                    </form>

                    </td>";

                    echo "</tr>";
                }

                ?>

            </table>

        </div>

        <!-- REVISI -->
        <div class="admin-card">

            <h2>Revisi Client</h2>

            <table>

                <tr>

                    <th>ID Pesanan</th>

                    <th>Deskripsi</th>

                    <th>Referensi</th>

                    <th>Hasil Revisi</th>

                    <th>Aksi</th>

                </tr>

                <?php

                $sqlRevisi = "SELECT * FROM revisi
        ORDER BY id_revisi DESC";

                $parseRevisi = oci_parse($conn, $sqlRevisi);

                oci_execute($parseRevisi);

                while ($r = oci_fetch_assoc($parseRevisi)) {

                    echo "<tr>";

                    echo "<td>" . $r['ID_PESANAN'] . "</td>";

                    echo "<td>" . $r['DESKRIPSI'] . "</td>";

                    // REFERENSI
                    if (!empty($r['LINK_REFERENSI'])) {

                        echo "<td>

                <a
                href='" . $r['LINK_REFERENSI'] . "'
                target='_blank'>

                Lihat

                </a>

                </td>";
                    } else {

                        echo "<td>-</td>";
                    }

                    // HASIL REVISI
                    if (!empty($r['HASIL_REVISI'])) {

                        echo "<td>

                <a
                href='" . $r['HASIL_REVISI'] . "'
                target='_blank'>

                Lihat Hasil

                </a>

                </td>";
                    } else {

                        echo "<td>Belum Upload</td>";
                    }

                    // FORM
                    echo "

            <td>

            <form action='upload_revisi.php' method='POST'>

            <input
            type='hidden'
            name='id_revisi'
            value='" . $r['ID_REVISI'] . "'>

            <input
            type='text'
            name='hasil_revisi'
            placeholder='Link hasil revisi'>

            <br><br>

            <button
            type='submit'
            class='btn'>

            Upload

            </button>

            </form>

            </td>

            ";

                    echo "</tr>";
                }

                ?>

            </table>

        </div>

    </div>

    </div>

</body>

</html>