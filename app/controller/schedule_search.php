<?php
include_once "../model/schedule.php";
include_once "../model/subject.php";
include_once "../model/teacher.php";
include_once '../common/database.php';
include_once '../common/define.php';
include_once 'common.php';
if (isset($_POST['editSchedule'])) {
    $_SESSION['idEdit'] = $_POST['editSchedule'];
    header("Location:schedule_edit_input.php?id=" . $_SESSION['idEdit']);
}
if (isset($_POST['deleteSchedule'])) {
    $isToast = true;
    $_SESSION['idDelete'] = $_POST['deleteSchedule'];
}
if (isset($_POST['confirmDelete'])) {
    deleteSchedule($_SESSION['idDelete']);
}
if (isset($_GET['schedule_search'])) {
    $_SESSION['school_year'] = $_GET['school_year'];
    $_SESSION['subject_name'] = $_GET['subject_name'];
    $_SESSION['teacher_name']= $_GET['teacher_name'];
    $scheduleResult= scheduleSearch( $_SESSION['school_year'],$_SESSION['subject_name'], $_SESSION['teacher_name']);
} else {
    $allSchedule = getAllSchedule();
}
$allSubject = get_all_subjects();
$allTeacher = get_all_teachers();
include_once "../views/schedule_search.php";
