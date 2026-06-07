<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css?v=2">
</head>

<body class="login-page">

    <div class="login-container">
        <div class="login-card">

            <!-- KIRI -->
            <div class="login-left"></div>

            <!-- KANAN -->
            <div class="login-right">
                <h2>Sign Up</h2>

                <?php
                if (isset($_GET['error'])) {
                    echo "<p class='error'>Password tidak sama!</p>";
                }
                ?>


                <form action="proses_signup.php" method="POST">

                    <input type="email" name="email" placeholder="Email" required>

                    <input type="text" name="nama" placeholder="Nama" required>

                    <input type="password" name="password" placeholder="Password" required>

                    <input type="password" name="confirm" placeholder="Confirm Password" required>

                    <button type="submit">Register</button>

                </form>

                <p class="signup">
                    Already have an account? <a href="login.php">Login</a>
                </p>

            </div>

        </div>
    </div>

</body>

</html>