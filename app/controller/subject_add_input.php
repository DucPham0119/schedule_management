<?php

include '../common/database.php';
include '../model/subject.php';
include '../controller/common.php';

$allowedTypes = [
    'image/png' => 'png',
    'image/jpeg' => 'jpg'
];
/**
 * @param $data
 * @return string
 * Hàm này để chuẩn hóa một chút data mà người dùng nhập vào
 */
function checkData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['submit_subject_add'])){

    // kiểm tra đường dẫn file chứa avatar tạm thời của subject, nếu chưa có -> tạo mới
    $dir_tmp = "../../assets/avatar/tmp";
    if (! file_exists($dir_tmp)) {
        mkdir($dir_tmp);
    }
    // kiểm tra đường dẫn file chứa avatar của subject, nếu chưa có -> tạo mới
    $dir = "../../assets/avatar/subject";
    if (! file_exists($dir)) {
        mkdir($dir);
    }

    // kiểm tra validate của subject_name
    $checked_subject_name = checkData($_POST['subject_name']);
    if ( empty($checked_subject_name)){
        $error['subject_name_empty'] = "Hãy nhập tên môn học";
    }

    if ( strlen($checked_subject_name) > 100){
        $error['subject_name_length'] = "Không nhập quá 100 ký tự";
    }

    // kiểm tra validate của school_year
    $checked_school_year = checkData($_POST['school_year']);
    if ( empty($checked_school_year)){
        $error['school_year_empty'] = "Hãy chọn khóa học";
    }

    // kiểm tra validate của subject_note
    $checked_subject_note = checkData($_POST['subject_note']);
    if ( empty($checked_subject_note)){
        $error['subject_note_empty'] = "Hãy nhập mô tả chi tiết";
    }

    if ( strlen($checked_subject_note) > 1000){
        $error['subject_note_length'] = "Không nhập quá 1000 ký tự";
    }

    //kiểm tra validate của subject_avatar
    $checked_subject_avatar = checkData($_FILES['subject_avatar']['name']);
    if ( empty($checked_subject_avatar) ){
        /** ở form subject_add_confirm nếu ấn sửa lại thì sẽ quay lại trang này,
         * khi đó sẽ có thêm old_subject_avatar (ảnh người dùng đã submit)
         * TH1: người dùng không chọn ảnh mới -> dùng luôn ảnh old_subject_avatar
         * TH2: người dùng chọn ảnh mới -> sẽ thêm ảnh mới vào như bình thường
         */
        if (empty($_POST['old_subject_avatar'])){
            $error['subject_avatar_empty'] = "Hãy chọn avatar";
        }
        else{
            $name = $_POST['old_subject_avatar'];
        }
    }
    else {
        $files =  $_FILES['subject_avatar']['tmp_name'];
        $name = date('YmdHis').$_FILES['subject_avatar']['name'];
        $path = "../../assets/avatar/tmp/".$name;
        move_uploaded_file($files, $path);
        // kiểm tra có phải ảnh không, nếu không phải -> xóa + error
        if (! getimagesize("../../assets/avatar/tmp/".$name)) {

            /** cái if này đề phòng không xóa được file lỗi thì không bị nảy ra error
             * cũng không rõ có cần thiết không hiếu or đạt check thì có thể sửa nhé  */
            if (unlink("../../assets/avatar/tmp/".$name)) {

            }
            else{
                header('Location:subject_add_input.php');
            }

            $error['subject_avatar_empty'] = 'Hãy chọn file png hoặc jpg';
        }
        else{
            // có ảnh mới thì xóa ảnh cũ đi
            if (isset($_POST['old_subject_avatar'])){
                if (unlink("../../assets/avatar/tmp/".$_POST['old_subject_avatar'])){

                }
                else{
                    header('Location:subject_add_input.php');
                }
            }
        }
    }

    if(!$error){
        $_SESSION['subject_name'] = $_POST['subject_name'];
        $_SESSION['school_year'] = $_POST['school_year'];
        $_SESSION['subject_note'] = $_POST['subject_note'];
        $_SESSION['subject_avatar'] = $name;

        header('Location:subject_add_confirm.php');
    }
    else{
        include '../views/subject_add_input.php';
    }
}
else{
    include '../views/subject_add_input.php';
}
?>

