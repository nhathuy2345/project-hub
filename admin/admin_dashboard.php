<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

require "../config/database.php";

$totalContacts = $pdo->query(
    "SELECT COUNT(*) FROM contacts"
)->fetchColumn();
include "../components/header.php";
include "../components/sidebar.php";
?>
<div class="dashboard-header">
            <div>
                <h1>Xin chào Admin 👋</h1>
                <p>Hệ thống quản lý Kho Đồ Án</p>
            </div>

            <a href="logout.php" class="logout-btn">
                Đăng xuất
            </a>

        </div>

        <div class="stats-grid">

            <div class="stat-card">
                <h3>Tổng yêu cầu tư vấn</h3>
                <div class="number">
                    <?= $totalContacts ?>
                </div>
            </div>

            <div class="stat-card">
                <h3>Tổng đồ án</h3>
                <div class="number">
                    0
                </div>
            </div>

            <div class="stat-card">
                <h3>Tài liệu</h3>
                <div class="number">
                    0
                </div>
            </div>

            <div class="stat-card">
                <h3>Slide</h3>
                <div class="number">
                    0
                </div>
            </div>

        </div>
<?php
include "../components/footer.php";
?>