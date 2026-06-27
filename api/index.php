<?php
include "koneksi.php";

if (isset($_COOKIE['login']) && $_COOKIE['login'] == 'true') {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM users
        WHERE username='$username'
        AND password='$password'"
    );

    if (mysqli_num_rows($query) > 0) {
        setcookie("login", "true", time() + 86400, "/");
        setcookie("username", $username, time() + 86400, "/");

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau Password salah";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Login</h2>

    <?php
    if (isset($error)) {
        echo "<p style='color:red;'>" . $error . "</p>";
    }
    ?>

    <form method="POST">

        <label>Username</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password</label><br>
        <input type="password" name="password" required><br><br>

        <button name="login">Login</button>

    </form>

</body>
</html>