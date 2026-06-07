<!DOCTYPE html>
<html>

<head>

    <title>Reset Password</title>

    <link rel="stylesheet" href="css/style.css?v=999">

</head>

<body class="login-page">

    <div class="order-container">

        <h2>Reset Password</h2>

        <p>

            Masukkan email dan password baru.

        </p>

        <form action="proses_forgot.php" method="POST">

            <label>Email</label>

            <input
                type="email"
                name="email"
                required>

            <label>Password Baru</label>

            <input
                type="password"
                name="password"
                required>

            <button type="submit">

                Reset Password

            </button>

        </form>

        <div class="back-wrapper">
            <a href="index.php" class="back-home">← Kembali ke Home</a>
        </div>

    </div>

</body>

</html>