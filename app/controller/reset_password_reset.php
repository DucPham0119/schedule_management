<?php
include '../controller/common.php'; // common kiem tra session
include '../common/database.php'; // database kết nối -> bắt buộc mọi controller phải có dòng này
include '../model/admin.php'; // model -> lựa chọn model phù hợp


$errorsMissing = array('required' => '', 'minlength' => '');

if (isset($_POST['reset'])) {
    if (!empty($_GET['id'])) {
        $new_pass =  $_POST[$_GET['id']];
        if (strlen($new_pass) < 6) {
            $errorsMissing['minlength'] = 'Hãy nhập mật khẩu có tối thiểu 6 ký tự';
        }
        if (empty($new_pass)) {
            $errorsMissing['required'] = 'Hãy nhập mật khẩu mới';
        }
        if (empty($errorsMissing['required']) && empty($errorsMissing['minlength'])) {
            edit_admin($_GET['id'], $new_pass);
        }
    }
}
$get_all_admin_reset = get_admin_reset_token_not_empty();
include '../views/reset_password_reset.php'; // view
