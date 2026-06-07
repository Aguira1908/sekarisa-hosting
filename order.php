<?php

session_start();

if (!isset($_SESSION['id_user'])) {

    echo "

    <script>

    alert('Login dulu sebelum melakukan pemesanan');

    window.location='login.php';

    </script>

    ";

    exit;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Order Jasa</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="order-container">

        <h2>Form Pemesanan</h2>

        <form action="proses_order.php" method="POST" enctype="multipart/form-data">

            <label>Pilih Layanan</label>
            <select name="layanan" required onchange="ubahForm()" id="layanan">
                <option value="">-- Pilih Layanan --</option>
                <option value="Video">Video Editing</option>
                <option value="Photo">Photo Editing</option>
            </select>

            <!-- VIDEO -->
            <div id="videoForm" style="display:none;">
                <label>Durasi Video (menit)</label>
                <input type="number" name="durasi" placeholder="Contoh: 5">
            </div>

            <!-- PHOTO -->
            <div id="photoForm" style="display:none;">
                <label>Jumlah Foto</label>
                <input type="number" name="jumlah_foto" placeholder="Contoh: 10">
            </div>

            <label>Nama</label>
            <input
                type="text"
                name="nama"
                placeholder="Masukkan Nama"
                required>

            <label>No HP</label>
            <input type="text" name="hp" placeholder="Masukkan No HP" required>

            <label>Deskripsi Edit</label>
            <textarea name="deskripsi" placeholder="Contoh: Ingin lebih cerah" required></textarea>

            <!-- FILE -->
            <label>Upload File (foto/video)</label>
            <input type="file" name="file">

            <!-- LINK -->
            <label>Link Google Drive (jika perlu)</label>
            <input type="text" name="link" placeholder="https://drive.google.com/...">

            <!-- BUTTON -->
            <button class="btn">Lanjut ke Pembayaran</button>
            <div class="back-wrapper">
                <a href="index.php" class="back-home">← Kembali ke Home</a>
            </div>

        </form>

    </div>

    <!-- SCRIPT -->
    <script>
        function ubahForm() {
            var layanan = document.getElementById("layanan").value;

            document.getElementById("videoForm").style.display = "none";
            document.getElementById("photoForm").style.display = "none";

            if (layanan == "Video") {
                document.getElementById("videoForm").style.display = "block";
            } else if (layanan == "Photo") {
                document.getElementById("photoForm").style.display = "block";
            }
        }
    </script>

</body>

</html>