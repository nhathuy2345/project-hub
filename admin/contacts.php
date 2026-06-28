<?php
session_start();

if (!isset($_SESSION["admin_id"])) {

    header("Location: login.php");
    exit;
}

require "../config/database.php";

$contacts = $pdo
    ->query("SELECT id, full_name, phone, major, message, created_at FROM contacts ORDER BY created_at DESC")
    ->fetchAll();
    include "../components/header.php";
    include "../components/sidebar.php";
?>
    <main class="admin-page">
        <section class="admin-heading">
            <p class="eyebrow">Database</p>
            <h1>Danh sách yêu cầu tư vấn</h1>
            <a class="btn secondary" href="../index.html">Về trang chủ</a>
            <a href="logout.php" class="btn secondary">
    Đăng xuất
</a>
        </section>

        <section class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                        <th>Ngành</th>
                        <th>Nội dung</th>
                        <th>Thời gian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><?= htmlspecialchars($contact["id"]) ?></td>
                            <td><?= htmlspecialchars($contact["full_name"]) ?></td>
                            <td><?= htmlspecialchars($contact["phone"]) ?></td>
                            <td><?= htmlspecialchars($contact["major"]) ?></td>
                            <td><?= htmlspecialchars($contact["message"]) ?></td>
                            <td><?= htmlspecialchars($contact["created_at"]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
<?php
include "../components/footer.php";

