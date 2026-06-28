<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

require "../config/database.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = trim($_POST["title"]);
    $major = trim($_POST["major"]);
    $category = trim($_POST["category"]);
    $description = trim($_POST["description"]);
    $code_link = trim($_POST["code_link"]);
    $document_link = trim($_POST["document_link"]);
    $slide_link = trim($_POST["slide_link"]);

    $sql = "INSERT INTO projects
    (
        title,
        major,
        category,
        description,
        code_link,
        document_link,
        slide_link
    )
    VALUES
    (
        :title,
        :major,
        :category,
        :description,
        :code_link,
        :document_link,
        :slide_link
    )";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        "title" => $title,
        "major" => $major,
        "category" => $category,
        "description" => $description,
        "code_link" => $code_link,
        "document_link" => $document_link,
        "slide_link" => $slide_link
    ]);

    header("Location: admin_projects.php");
    exit;
}
include "../components/header.php";
include "../components/sidebar.php";
?>
<div class="form-container">

    <h1>➕ Thêm đồ án mới</h1>

    <form method="POST">

        <div class="form-group">
            <label>Tên đồ án</label>
            <input type="text" name="title" required>
        </div>

        <div class="form-group">
            <label>Ngành học</label>

            <select name="major" required>

                <option value="CNTT">CNTT</option>

                <option value="Kế toán">Kế toán</option>

                <option value="Marketing">Marketing</option>

                <option value="QTKD">QTKD</option>

                <option value="Luật">Luật</option>

                <option value="Điều dưỡng">Điều dưỡng</option>

            </select>

        </div>

        <div class="form-group">
            <label>Loại đồ án</label>

            <input
                type="text"
                name="category"
                placeholder="Khóa luận, Báo cáo, Đồ án..."
                required
            >
        </div>

        <div class="form-group">
            <label>Mô tả</label>

            <textarea
                name="description"
                required
            ></textarea>
        </div>

        <div class="form-group">
            <label>Link Source</label>

            <input
                type="text"
                name="code_link"
            >
        </div>

        <div class="form-group">
            <label>Link Tài liệu</label>

            <input
                type="text"
                name="document_link"
            >
        </div>

        <div class="form-group">
            <label>Link Slide</label>

            <input
                type="text"
                name="slide_link"
            >
        </div>

        <button class="btn btn-primary">
            Lưu đồ án
        </button>

    </form>

</div>
<?php
include "../components/footer.php";
?>

