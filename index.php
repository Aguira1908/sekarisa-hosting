<?php include 'koneksi.php'; ?>
<!doctype html>
<html>

<head>
  <title>Juarajasa.id</title>
  <link rel="stylesheet" href="css/style.css?v=99999" />
</head>

<body>

  <!-- NAVBAR -->
  <div class="navbar">
    <div class="container">

      <h2 class="logo">Juarajasa.id</h2>

      <div class="menu">
        <a href="#">Home</a>
        <a href="about.php">About</a>
        <a href="#services">Services</a>
        <?php if (!isset($_SESSION['id_user'])) { ?>

          <a href="login.php">Login</a>

        <?php } else { ?>

          <a href="logout.php">Logout</a>

        <?php } ?>
      </div>

    </div>
  </div>

  <!-- HERO -->
  <div class="home-hero">

    <div class="home-overlay"></div>

    <div class="container home-flex">

      <!-- LEFT -->
      <div class="home-text">

        <span class="mini-badge">
          Creative Editing Service
        </span>

        <h1>
          Bikin Konten Kamu<br>
          <span>Naik Level.</span>
        </h1>

        <p>
          Editing profesional buat konten yang lebih aesthetic,
          impactful, dan siap tampil di level berikutnya.
        </p>

        <div class="hero-buttons">
          <a href="order.php" class="btn">
            Mulai Sekarang
          </a>
        </div>

      </div>

      <!-- RIGHT -->
      <div class="home-box">

        <h3>Why Choose Us?</h3>

        <p>✔ Fast Response</p>
        <p>✔ Affordable Price</p>
        <p>✔ Professional Editing</p>
        <p>✔ Aesthetic Result</p>


        <div class="tos-wrapper">

          <a href="tos.php" class="tos-btn">

            Terms of Service

          </a>

        </div>


      </div>

    </div>

    <!-- STATS -->
    <div class="home-stats">

      <div class="stat">
        <h3>100+</h3>
        <p>Project</p>
      </div>

      <div class="stat">
        <h3>50+</h3>
        <p>Client</p>
      </div>

      <div class="stat">
        <h3>4.9★</h3>
        <p>Rating</p>
      </div>

    </div>

  </div>

  <!-- SERVICES -->
  <section class="category" id="services">

    <div class="container">

      <div class="section-head">
        <h2>Layanan Kami</h2>
        <p>Pilih layanan sesuai kebutuhan kamu</p>
      </div>

      <div class="cards">

        <!-- CARD -->
        <div class="card" style="background-image: url('images/video_edit.jpeg')">
          <div class="overlay">
            <h3>Video Editing</h3>
            <p><b>Mulai Rp50.000</b></p>
            <a href="order.php?layanan=video" class="btn">
              Pesan
            </a>
          </div>
        </div>

        <!-- CARD -->
        <div class="card" style="background-image: url('images/photo_edit.jpeg')">
          <div class="overlay">
            <h3>Photo Editing</h3>
            <p><b>Mulai Rp20.000</b></p>
            <a href="order.php?layanan=photo" class="btn">
              Pesan
            </a>
          </div>
        </div>

        <!-- CARD -->
        <div class="card" style="background-image: url('images/progress.jpeg')">
          <div class="overlay">
            <h3>Track Order</h3>
            <p><b>Cek progress pesanan</b></p>
            <a href="pesanan.php" class="btn-secondary">
              Cek
            </a>
          </div>
        </div>


      </div>

    </div>

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