<?php
// Bắt đầu session
session_start();

// Xóa toàn bộ session
session_unset();
session_destroy();

// Chuyển hướng về trang đăng nhập hoặc trang chủ
header("Location: ../../FrontEnd/loginadmin/login.php");
exit();
?>