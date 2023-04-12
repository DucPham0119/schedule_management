<?php
include_once "../model/schedule.php";
include_once '../common/database.php';
include '../controller/common.php';
include("../common/database.php");
include("../common/define.php");
include '../model/subject.php';
include '../model/teacher.php';

$subjects = get_all_subjects();
$teachers = get_all_teachers();
if (isset($_POST['confirm_add'])) {
    $params = [
        'school_year' => $_SESSION['school_year'],
        'subject_id' => $_SESSION['subject_id'],
        'teacher_id' => $_SESSION['teacher_id'],
        'week_day' => $_SESSION['week_day'],
        'lession' => $lession = implode(',', $_SESSION['lession']),
        'notes' => $_SESSION['notes'],
    ];
    // add_schedule()
    $result = add_schedule($params);
    if ($result) {
        unset($_SESSION['school_year']);
        unset($_SESSION['subject_id']);
        unset($_SESSION['teacher_id']);
        unset($_SESSION['week_day']);
        unset($_SESSION['lession']);
        unset($_SESSION['notes']);

        header('Location: schedule_add_complete.php');
    } else {
        include_once "../views/schedule_add_confirm.php";
    }
} elseif (isset($_POST['confirm_edit'])){
    header('Location: ./schedule_add_input.php');
}  else {
    include_once "../views/schedule_add_confirm.php";
}
