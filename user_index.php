<?php include_once("header.php"); ?>
<?php 
session_start();

if(isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Header</title>
</head>
<body>
    
    <ul class="menu">
        <li>
            <a href="/QL_NHANSU/user_list_nhanvien.php">Danh sách Nhân Viên</a>
        </li>
        
        <?php if(isset($_SESSION['username'])): ?>
        <li>
            <form method="post" action="">
                <input type="submit" name="logout" value="Đăng xuất">
            </form>
        </li>
        <?php endif; ?>
    </ul>
</body>
</html>
<?php include_once("footer.php"); ?>