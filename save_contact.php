<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html#contact");
    exit;
}

$fullName = trim($_POST["full_name"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$major = trim($_POST["major"] ?? "");
$message = trim($_POST["message"] ?? "");

if (
    $fullName === "" ||
    $phone === "" ||
    $major === "" ||
    $message === ""
) {
    die("Vui long nhap day du thong tin.");
}

$sql = "INSERT INTO contacts (
            full_name,
            phone,
            major,
            message
        )
        VALUES (
            :full_name,
            :phone,
            :major,
            :message
        )";

$statement = $pdo->prepare($sql);

$statement->execute([
    "full_name" => $fullName,
    "phone" => $phone,
    "major" => $major,
    "message" => $message,
]);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi yêu cầu thành công</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<main class="result-page">
    <section class="result-box">
        <p class="eyebrow">Đã lưu vào cơ sở dữ liệu</p>

        <h1>Gửi yêu cầu thành công</h1>

        <p>
            Thông tin của bạn đã được lưu thành công.
            Chúng tôi sẽ liên hệ tư vấn trong thời gian sớm nhất.
        </p>

        <a class="btn primary" href="index.html">
            Quay lại trang chủ
        </a>
    </section>
</main>

</body>
</html>