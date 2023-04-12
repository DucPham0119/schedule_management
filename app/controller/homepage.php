<?php 
include '../controller/common.php'; // common kiem tra session
include '../common/database.php'; // database kết nối -> bắt buộc mọi controller phải có dòng này
include '../model/admin.php'; // model -> lựa chọn model phù hợp

# xử lí logout ở đây
if(isset($_POST['logout'])){
    unset($_SESSION['username']);
    header('Location: ../../login.php');
}

include '../views/homepage.php' // view
?>