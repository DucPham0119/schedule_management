<?php
// include '../controller/common.php'; // common kiem tra session
include '../common/database.php'; // database kết nối -> bắt buộc mọi controller phải có dòng này
include '../model/subject.php';
include '../model/teacher.php';
include '../common/define.php';
session_start();

$subjects = get_all_subjects();
$teachers = get_all_teachers();

$errorsMissing = [];

if (isset($_POST['confirm_submit'])) {

    $school_year = $_POST['school_year'];
    $subject_id = $_POST['subject_id'];
    $teacher_id = $_POST['teacher_id'];
    $week_day = $_POST['week_day'];
    if (isset($_POST['lession'])){
        $lession = $_POST['lession'];
    }
    $notes = $_POST['notes'];

    if (empty($school_year)) {
        $errorsMissing['school_year'] = 'Hãy chọn năm học';
    }
    if (empty($subject_id)) {
        $errorsMissing['subject_id'] = 'Hãy chọn môn học';
    }
    if (empty($teacher_id)) {
        $errorsMissing['teacher_id'] = 'Hãy chọn giáo viên';
    }
    if (empty($week_day)) {
        $errorsMissing['week_day'] = 'Hãy chọn thứ trong tuần';
    }
    if (!isset($lession)) {
        $errorsMissing['lession'] = 'Hãy chọn tiết học';
    }
    if (empty($notes)) {
        $errorsMissing['notes'] = 'Hãy điền lưu ý';
    }

    if (empty($errorsMissing)) {
        $_SESSION['school_year'] = $school_year;
        $_SESSION['subject_id'] = $subject_id;
        $_SESSION['teacher_id'] = $teacher_id;
        $_SESSION['week_day'] = $week_day;
        $_SESSION['lession'] = $lession;
        $_SESSION['notes'] = $notes;

        header('Location: schedule_add_confirm.php');
    } else {
        include_once "../views/schedule_add_input.php";
    }
}
else{
    include '../views/schedule_add_input.php';
}
