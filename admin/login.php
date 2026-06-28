<?php
session_start();
require "config.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    $stmt = $pdo->prepare(
        "SELECT * FROM admins WHERE username = ?"
    );

    $stmt->execute([$username]);

    $admin = $stmt->fetch();

    if ($admin && $admin["password"] === $password) {

        $_SESSION["admin_id"] = $admin["id"];
        $_SESSION["admin_name"] = $admin["username"];

        header("Location: admin_dashboard.php");
        exit;
    }

    $error = "Sai tài khoản hoặc mật khẩu";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Đăng nhập Admin</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="login-box">

<h2>Đăng nhập Admin</h2>

<?php if($error): ?>
<p><?= $error ?></p>
<?php endif; ?>

<form method="POST">

<input
type="text"
name="username"
placeholder="Tên đăng nhập"
required>

<input
type="password"
name="password"
placeholder="Mật khẩu"
required>

<button type="submit">
Đăng nhập
</button>

</form>

</div>

</body>
</html>