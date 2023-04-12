<?php
include '../controller/common.php'; // common kiem tra session
include '../common/database.php'; // database kết nối -> bắt buộc mọi controller phải có dòng này
include '../model/subject.php';
include '../common/define.php';

$subjectInfos = get_subject_by_id($_GET['edit_subject']);

if (isset($_POST['subject_edit_confirm'])) {
    $subject_name = $_POST['subject_name'];
    $school_year = $_POST['school_year'];
    $subject_note = $_POST['subject_note'];
    $subject_avatar = isset($_POST['subject_avatar']) ? $_POST['subject_avatar'] : $subjectInfos['avatar'];

    edit_subject($subjectInfos['id'], $subject_name, $school_year, $subject_note, $subject_avatar);

    if (isset($_POST['subject_avatar'])) {
        // Xóa file ảnh cũ
        $old_file_path = "../../assets/avatar/subject/{$subjectInfos['id']}/{$subjectInfos['avatar']}";
        unlink($old_file_path);

        // Chuyển ảnh từ temp sang thư mục chính
        $file_path_from = "../../assets/avatar/tmp/{$_SESSION['subject_avatar']}";
        $file_path_to = "../../assets/avatar/subject/{$subjectInfos['id']}/{$_SESSION['subject_avatar']}";
        copy($file_path_from, $file_path_to);
        unlink($file_path_from);
    }

    unset($_SESSION['subject_name']);
    unset($_SESSION['school_year']);
    unset($_SESSION['subject_note']);
    unset($_SESSION['subject_avatar']);

    header('Location: subject_edit_complete.php');
}

if (isset($_POST['subject_edit_fix'])) {
    header('Location: subject_edit_input.php?edit_subject='.$subjectInfos['id']);
}

include_once '../views/subject_edit_confirm.php';
?>