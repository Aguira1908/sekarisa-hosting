<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>About - Juarajasa.id</title>
    <link rel="stylesheet" href="css/style.css?v=3">
</head>

<body class="about-page">

    <!-- NAVBAR -->
    <div class="navbar">
        <div class="container">
            <h2 class="logo">Juarajasa.id</h2>

            <div class="menu">
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="index.php#services">Services</a>
                <a href="login.php">Login</a>
            </div>
        </div>
    </div>

    <!-- HERO -->
    <section class="about-hero-new">
        <h1>About Us</h1>
        <p>Kami bukan cuma edit, kami bantu ceritain ide lo lewat visual</p>
    </section>

    <!-- MAIN CONTENT -->
    <section class="about-grid">
        <div class="container grid-2">

            <!-- LEFT -->
            <div class="about-left">
                <h2>Our Story</h2>

                <p style="text-align: justify;">
                    Juarajasa.id lahir dari passion di dunia editing. Dari sekadar coba-coba, berkembang jadi layanan profesional yang dipercaya banyak orang. Setiap project dikerjakan dengan detail dan kreativitas agar hasil akhirnya terlihat lebih clean, modern, dan sesuai dengan karakter masing-masing client.
                </p>

                <p style="text-align: justify;">
                    Kami percaya setiap konten punya cerita. Tugas kami adalah bikin cerita itu terlihat lebih hidup dan punya impact. Karena itu, kami selalu berusaha memberikan hasil editing yang tidak hanya bagus secara visual, tetapi juga nyaman dilihat dan berkesan.
                </p>


            </div>

            <!-- RIGHT -->
            <div class="about-card">
                <h3>Stay Updated</h3>

                <p>
                    Dapatkan promo terbaru, update layanan editing,
                    dan penawaran spesial langsung ke email Anda.
                </p>

                <form action="proses_newsletter.php" method="POST">

                    <input
                        type="email"
                        name="email"
                        placeholder="Your Email"
                        required>

                    <button type="submit">
                        Submit Now
                    </button>

                </form>
            </div>

        </div>
    </section>

    <!-- INFO -->
    <section class="about-info">
        <div class="container info-grid">

            <div class="info-box">
                <h3>📞 Contact</h3>
                <p>(+62) 821-6296-1621</p>
            </div>

            <div class="info-box">
                <h3>📧 Email</h3>
                <p>sijuarajasa@gmail.com</p>
            </div>

            <div class="info-box">
                <h3>📍 Location</h3>
                <p>Indonesia</p>
            </div>

        </div>
    </section>

    <!-- MAP -->
    <section class="map">
        <iframe
            src="https://maps.google.com/maps?q=medan&t=&z=13&ie=UTF8&iwloc=&output=embed">
        </iframe>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container footer-grid">

            <div>
                <h2>Juarajasa.id</h2>
                <p>Creative editing service buat konten kamu makin standout!</p>
            </div>

            <div>
                <h4>Navigation</h4>
                <p>Home</p>
                <p>About</p>
                <p>Services</p>
            </div>

            <div>
                <h4>Contact</h4>
                <p>(+62) 821-6296-1621</p>
                <p>sijuarajasa@gmail.com</p>
            </div>

        </div>
    </footer>

</body>

</html>