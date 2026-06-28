<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

require "../config/database.php";

$projects = $pdo->query("
SELECT *
FROM projects
ORDER BY id DESC
")->fetchAll();
    include "../components/header.php";
    include "../components/sidebar.php";
?>
<div class="admin-container">

<h1>📚 Quản lý đồ án</h1>

<div class="admin-actions">

<a href="admin_add_project.php" class="btn btn-primary">
➕ Thêm đồ án
</a>

<a href="admin_dashboard.php" class="btn btn-secondary">
🏠 Dashboard
</a>

</div>

<table class="admin-table">

<thead>

<tr>

<th>ID</th>

<th>Tên đồ án</th>

<th>Ngành</th>

<th>Loại</th>

<th>Ngày thêm</th>

<th>Thao tác</th>

</tr>

</thead>

<tbody>

<?php foreach($projects as $project): ?>

<tr>
    <td><?= $project["id"] ?></td>

<td><?= htmlspecialchars($project["title"]) ?></td>

<td><?= htmlspecialchars($project["major"]) ?></td>

<td><?= htmlspecialchars($project["category"]) ?></td>

<td><?= $project["created_at"] ?></td>


<td>

<div class="action-group">

<a
href="edit_project.php?id=<?= $project['id'] ?>"
class="btn-edit">
✏️ Sửa
</a>

<a
href="delete_project.php?id=<?= $project['id'] ?>"
class="btn-delete"
onclick="return confirm('Bạn có chắc muốn xóa đồ án này?')">
🗑 Xóa
</a>

</div>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>
<?php
include "../components/footer.php";
?>
