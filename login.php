<?php
include 'app/common/database.php';
include 'app/model/admin.php';

session_start();
$login_id = $password = '';
$errors = array('login_id' => '', 'password' => '');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status_login = true; // biến kiểm tra đăng nhập
    // check login_id
    if (empty($_POST['login_id'])) {
        $errors['login_id'] = 'Hãy nhập tên đăng nhập <br />';
        $status_login = false;
    }elseif (strlen($_POST['login_id']) < 4) {
        $errors['login_id'] = 'Tên đăng nhập phải có ít nhất 4 ký tự <br />';
        $status_login = false;
    } else {
        $login_id = $_POST['login_id'];
    }
    // check password
    if (empty($_POST['password'])) {
        $errors['password'] = 'Hãy nhập mật khẩu <br />';
        $status_login = false;
    }elseif (strlen($_POST['password']) < 6) {
        $errors['password'] = 'Mật khẩu phải có ít nhất 6 ký tự <br />';
        $status_login = false;
    } else {
        $password = $_POST['password'];
    }
    // if there are no errors, save to database
    if ($status_login == true) {
        $admin = get_admins($login_id, $password);
        if(!empty($admin)){
            $_SESSION['username'] = $login_id;
            $_SESSION['success'] = "You are now logged in";
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $_SESSION['timelogin'] = date("Y-m-d h:i:s");
            header('location: app/controller/homepage.php');
        }else{
            $errors['password'] = 'Tên đăng nhập hoặc mật khẩu không đúng';
        }
    }
}

include 'app/views/login.php'
?>