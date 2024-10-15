<?php
function checkUser($username, $password) {
    // Kết nối cơ sở dữ liệu
    $servername = "localhost";
    $dbname = "db_user";
    $dbuser = "root";
    $dbpass = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Truy vấn để lấy mật khẩu và vai trò (role) của người dùng
        $stmt = $conn->prepare("SELECT password, role FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                // Kiểm tra vai trò của người dùng
                if ($user['role'] == 1) {
                    return "admin"; // Người dùng là admin
                } else {
                    return "not_admin"; // Người dùng không phải admin
                }
            } else {
                return "wrong_password"; // Sai mật khẩu
            }
        } else {
            return "user_not_found"; // Người dùng không tồn tại
        }
    } catch(PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}

// Kiểm tra đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $loginResult = checkUser($username, $password);
    if ($loginResult === "admin") {
        header('location:../admin/admin.php');
        // Chuyển hướng hoặc thực hiện hành động cần thiết khi là admin
    } elseif ($loginResult === "not_admin") {
        echo "Bạn không phải admin.";
    } elseif ($loginResult === "wrong_password") {
        echo "Mật khẩu không chính xác.";
    } elseif ($loginResult === "user_not_found") {
        echo "Tên người dùng không tồn tại.";
    } else {
        echo "Đã xảy ra lỗi. Vui lòng thử lại.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title><link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="Login-box">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="row">
                <input type="text" id="username" name="username" required>
                <label for="username">Username</label>
            </div>
            <div class="row">
                <input type="password" id="password" name="password" required>
                <label for="password">Password</label>
            </div>
            <button type="submit" name="submit">
            <span></span>
                <span></span>
                <span></span>
                <span></span>
                Submit
            </button>
        </form>
    </div>
</body>
</html>