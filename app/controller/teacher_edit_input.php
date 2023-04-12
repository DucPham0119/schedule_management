<?php
include '../controller/common.php'; // common kiem tra session
include '../common/database.php'; // database kết nối -> bắt buộc mọi controller phải có dòng này
include '../model/teacher.php';
include '../common/define.php';

$teacher_info = get_teacher_by_id($_GET['edit_teacher']);

/**
 * @param $data
 * @return string
 * Chuẩn hóa dữ liệu đầu vào
 */
function checkData($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['teacher_edit_submit'])){

    // kiểm tra đường dẫn file chứa avatar tạm thời, nếu chưa có -> tạo mới
    $dir_tmp = "../../assets/avatar/tmp";
    if (! file_exists($dir_tmp)) {
        mkdir($dir_tmp);
    }

    //kiểm tra validate của teacher_name
    $checked_teacher_name = checkData($_POST['teacher_name']);
    if ( empty($checked_teacher_name)){
        $error['teacher_name_empty'] = "Hãy nhập tên giáo viên";
    }

    if ( strlen($checked_teacher_name) > 100){
        $error['teacher_name_length'] = "Không nhập quá 100 ký tự";
    }

    //kiểm tra validate của teacher_specialized
    $checked_teacher_specialized = checkData($_POST['teacher_specialized']);
    if ( empty($checked_teacher_specialized)){
        $error['teacher_specialized_empty'] = "Hãy chọn bộ môn";
    }

    //kiểm tra validate của teacher_degree
    $checked_teacher_degree = checkData($_POST['teacher_degree']);
    if ( empty($checked_teacher_degree)){
        $error['teacher_degree_empty'] = "Hãy chọn bằng cấp";
    }

    // kiểm tra validate của teacher_note
    $checked_teacher_note = checkData($_POST['teacher_note']);
    if ( empty($checked_teacher_note)){
        $error['teacher_note_empty'] = "Hãy nhập mô tả chi tiết";
    }

    if ( strlen($checked_teacher_note) > 1000){
        $error['teacher_note_length'] = "Không nhập quá 1000 ký tự";
    }

    $checked_teacher_avatar = checkData($_FILES['teacher_avatar']['name']);
    if ( empty($checked_teacher_avatar) ){

    }
    else {
        $files =  $_FILES['teacher_avatar']['tmp_name'];
        $name = date('YmdHis').$_FILES['teacher_avatar']['name'];
        $path = "../../assets/avatar/tmp/".$name;
        move_uploaded_file($files, $path);
        // kiểm tra có phải ảnh không, nếu không phải -> xóa + error
        if (! getimagesize("../../assets/avatar/tmp/".$name)) {

            /** cái if này đề phòng không xóa được file lỗi thì không bị nảy ra error
             * cũng không rõ có cần thiết không hiếu or đạt check thì có thể sửa nhé  */
            if (unlink("../../assets/avatar/tmp/".$name)) {

            }
            else{
                $error['unlink'] = 'Không xóa được';

                include '../views/teacher_edit_input.php';
            }

            $error['teacher_avatar_empty'] = 'Hãy chọn file png hoặc jpg';
        }
//        else{
//            // có ảnh mới thì xóa ảnh cũ đi
//            if (isset($_POST['old_subject_avatar'])){
//                if (unlink("../../assets/avatar/tmp/".$_POST['old_subject_avatar'])){
//
//                }
//            }
//        }
    }

    if(!$error){
        $_SESSION['teacher_name'] = $_POST['teacher_name'];
        $_SESSION['teacher_specialized'] = $_POST['teacher_specialized'];
        $_SESSION['teacher_degree'] = $_POST['teacher_degree'];
        $_SESSION['teacher_note'] = $_POST['teacher_note'];
        $_SESSION['teacher_avatar'] = $name;
        header('Location:teacher_edit_confirm.php?edit_teacher='.$teacher_info['id']);

    }
    else{
        include '../views/teacher_edit_input.php';
    }
}
else{
    include_once '../views/teacher_edit_input.php';
}
?>
