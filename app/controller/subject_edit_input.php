<?php
include '../controller/common.php'; // common kiem tra session
include '../common/database.php'; // database kết nối -> bắt buộc mọi controller phải có dòng này
include '../model/subject.php';
include('../common/define.php');

$subjectInfos = get_subject_by_id($_GET['edit_subject']);

$errorsMissing = array('school_year' => '', 'subject_name' => '', 'subject_note' => '', 'subject_image' => '');

$data = array('school_year' => '', 'subject_name' => '', 'subject_note' => '', 'subject_image' => '');

function checkData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['edit_subject'])) {
    // kiem tra
    if (empty($_POST['subject_name'])) {
        $errorsMissing['subject_name'] = "Hãy nhập tên môn học";
    } 
    elseif (strlen($_POST['subject_name']) > 100) {
        $errorsMissing['subject_name'] = "Không nhập quá 100 kí tự";
    }
    else {
        $data['subject_name'] = $_POST['subject_name'];
    }
    if (empty($_POST['school_year'])) {
        $errorsMissing['school_year'] = "Hãy chọn khóa";
    } else {
        $data['school_year'] = $_POST['school_year'];
    }
    if (empty($_POST['subject_note'])) {
        $errorsMissing['subject_note'] = "Hãy nhập mô tả";
    } 
    elseif (strlen($_POST['subject_note']) > 1000) {
        $errorsMissing['subject_note'] = "Không nhập quá 1000 kí tự";
    }
    else {
        $data['subject_note'] = $_POST['subject_note'];
    }

    if (empty($_FILES['subject_avatar']['name'])) {
        $name = '';
        if (!empty($_SESSION['subject_avatar'])) {
            $name = $_SESSION['subject_avatar'];
        }
    } 
    else {
        if (!empty($_SESSION['subject_avatar'])) {
            unlink("../../assets/avatar/tmp/" . $_SESSION['subject_avatar']);
        } 

        $files = $_FILES['subject_avatar']['tmp_name'];
        $name = date('YmdHis').$_FILES['subject_avatar']['name'];
        $path = "../../assets/avatar/tmp/" . $name;

        move_uploaded_file($files, $path);

        if (!getimagesize("../../assets/avatar/tmp/" . $name)) {
            unlink("../../assets/avatar/tmp/" . $name);
            $errorsMissing['subject_image'] = 'Hãy chọn file png hoặc jpg';
        }
    }

    $_SESSION['subject_name'] = $data['subject_name'];
    $_SESSION['school_year'] = $data['school_year'];
    $_SESSION['subject_note'] = $data['subject_note'];
    $_SESSION['subject_avatar'] = $name;

    if ($errorsMissing['school_year'] == '' && $errorsMissing['subject_name'] == '' && $errorsMissing['subject_note'] == '' && $errorsMissing['subject_image'] == '') {
        header('Location: subject_edit_confirm.php?edit_subject='.$subjectInfos['id']);
    }
}
include_once '../views/subject_edit_input.php';
?>

