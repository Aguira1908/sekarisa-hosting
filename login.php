<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css?v=1">
</head>

<body class="login-page">


    <div class="login-container">
        <div class="login-card">

            <!-- KIRI (GAMBAR DOANG) -->
            <div class="login-left"></div>

            <!-- KANAN -->
            <div class="login-right">
                <h2>Login</h2>

                <form action="proses_login.php" method="POST">

                    <input type="email" name="email" placeholder="Email" required>

                    <input type="password" name="password" placeholder="Password" required>

                    <!-- FORGOT -->
                    <div class="password-row">
                        <a href="forgot.php" class="forgot">
                            Forgot password?
                        </a>
                    </div>

                    <button type="submit">Login</button>

                </form>

                <p class="signup">
                    Don't have an account? <a href="signup.php">Sign up</a>
                </p>

                <div class="back-wrapper">
                    <a href="index.php" class="back-home">← Kembali ke Home</a>
                </div>

                <?php
                if (isset($_GET['error'])) {
                    echo "<p class='error'>Email atau password salah</p>";
                }
                ?>
            </div>

        </div>
    </div>

</body>