<?php
session_start();
require_once("entities/nhanvien.class.php");
require_once("config/db.class.php");

$db = new Db(); //Khởi tạo đối tượng từ lớp Db
$connection = $db->connect();

if(isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$message = '';

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Xử lý đăng nhập
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $connection->query($query);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];

        // Kiểm tra vai trò và điều hướng người dùng đến trang tương ứng
        if($row['role'] == 'admin') {
            header("Location: index.php");
        } elseif ($row['role'] == 'user') {
            header("Location: user_index.php");
        }
        exit;
    } else {
        $message = "Tên đăng nhập hoặc mật khẩu không đúng.";
    }

    $connection->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <style>
        form {
            margin: 0 auto;
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <h2>Đăng nhập</h2>
        <?php if($message != '') { ?>
            <div class="message"><?php echo $message; ?></div>
        <?php } ?>
        <input type="text" name="username" placeholder="Tên đăng nhập" required><br>
        <input type="password" name="password" placeholder="Mật khẩu" required><br>
        <input type="submit" name="login" value="Đăng nhập">
    </form>
</body>
</html> 
