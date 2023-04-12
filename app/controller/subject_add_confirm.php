<?php

include '../common/database.php';
include '../model/subject.php';
include '../controller/common.php';

if (isset($_POST['confirm_subject_add'])){

    $subject_name = $_POST['subject_name'];
    $school_year = $_POST['school_year'];
    $subject_note = $_POST['subject_note'];
    $subject_avatar = $_POST['subject_avatar'];

    if ( add_subject($subject_name, $school_year, $subject_note, $subject_avatar)){

        /**
         * lấy id mới nhất của subject
         * tạo 1 folder mới với tên là id mới nhất
         */
        $last_subject_id = get_last_subject_id();
        $dir = "../../assets/avatar/subject/{$last_subject_id}";
        if (! file_exists($dir)){
            mkdir($dir, 0700);
        }

        //copy file ảnh từ file tạm thời sang file vừa tạo + xóa ảnh ở file tạm thời
        $file_path_from = "../../assets/avatar/tmp/{$subject_avatar}";
        $file_path_to = "../../assets/avatar/subject/{$last_subject_id}/{$subject_avatar}";
        copy($file_path_from, $file_path_to);
        if (unlink($file_path_from)){

            unset($_SESSION['subject_name']);
            unset($_SESSION['school_year']);
            unset($_SESSION['subject_note']);
            unset($_SESSION['subject_avatar']);

            header('Location:subject_add_complete.php');
        }
    }
    else{
        include '../views/subject_add_input.php';
    }
}else{
    include_once "../views/subject_add_confirm.php";
}

?>
