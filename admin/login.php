<?php
include 'koneksi.php';

if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['password'];

    // Cari user di database
    $query = "SELECT * FROM admin_users WHERE username = '$user'";
    $result = mysqli_query($conn, $query);
    $admin = mysqli_fetch_assoc($result);

    // Verifikasi jika user ada dan password cocok
    if ($admin && password_verify($pass, $admin['password_hash'])) {
        $_SESSION['admin'] = true;
        $_SESSION['admin_id'] = $admin['id'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Login Admin</h2>
            <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
            <form method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Masuk</button>
            </form>
        </div>
    </div>
</body>
</html>