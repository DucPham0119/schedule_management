<?php
include 'app/common/database.php';
include 'app/model/admin.php';

session_start();
$login_id = $password = '';
$errors = array('login_id' => '', 'strlen' => '', 'exist' => '');

if (isset($_POST['submit'])) {
    $login_id = $_POST['login_id'];
    if (empty($login_id)) {
        $errors['login_id'] = "Hãy nhập login id";
    }
    if (strlen($login_id) < 4) {
        $errors['strlen'] = "Hãy nhập login id đủ 4 ký tự";
    }
    if (!check_admin_login_id($login_id)) {
        $errors['exist'] = "Login id không tồn tại trong hệ thống";
    }
    if (empty($errors['exist']) && empty($errors['strlen']) && empty($errors['login_id'])) {
        if(update_microtime_request_password($login_id)) {
            header("location: login.php");
        }else{
           $errors['login_id'] = "Lỗi"; 
        }
    }
}
include 'app/views/reset_password_request.php';
