<?php

// connect db
include_once '../common/database.php';
// tìm kiếm thời khoá biểu
function scheduleSearch($school_year, $subject_name, $teacher_name)
{
    try {
        global $connection;
        $sql = "SELECT schedules.id,schedules.school_year,subjects.name as subject_name,teachers.name,schedules.week_day,schedules.lession from schedules join subjects ON schedules.subject_id=subjects.id AND subjects.name='{$subject_name}' AND schedules.school_year='{$school_year}'  join teachers ON teachers.id=schedules.teacher_id AND teachers.name='{$teacher_name}'";
        $result = $connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch (Exception $e) {
        var_dump($e);
    }
}


//Lấy danh sách thời khoá biểu
function getAllSchedule()
{
    try {
        global $connection;
        $sql = 'SELECT schedules.id,schedules.school_year,subjects.name as subject_name ,teachers.name,schedules.week_day,schedules.lession from schedules join subjects ON schedules.subject_id=subjects.id  join teachers ON teachers.id=schedules.teacher_id';
        $result = $connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch (Exception $e) {
        var_dump($e);
    }
}

// Xoá thời khoá biểu
function deleteSchedule($id)
{
    global $connection;
    $sql = "Delete from schedules WHERE schedules.id='{$id}'";
    $result = $connection->query($sql);
    return $result;
}


// CRUD

function add_schedule($params) //CREAT
{
    global $connection;

    $date = date("Y-m-d H:i:s");
    $sql  = "INSERT INTO `schedules` (school_year, subject_id, teacher_id, week_day, lession, notes, created) 
    VALUES ('{$params['school_year']}','{$params['subject_id']}','{$params['teacher_id']}','{$params['week_day']}','{$params['lession']}',?,'$date')";
//    $result = $connection->query($sql);

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $params['notes']);
    $stmt->execute();

    return true;
}

function get_all_schedules() //READ
{
    global $connection;

    $sql  = "SELECT * FROM `schedules`";

    $result = $connection->query($sql);
    $row = mysqli_fetch_assoc($result);

    return $row;
}

function get_schedule_by_id($id) //READ
{
    global $connection;

    $sql  = "SELECT * FROM `schedules` WHERE `id` = '$id'";

    $result = $connection->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    return $row;
}

function get_some_schedules($params) //READ
{
    global $connection;

    $sql  = "SELECT * FROM `schedules`
            WHERE ... AND ...";

    $result = $connection->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    return $row;
}

function edit_schedule($schedule_id, $school_year, $subject_id, $teacher_id, $week_day, $lession, $notes) //UPDATE
{
    global $connection;

    $sql = "UPDATE `schedules`
    SET school_year = '$school_year',
        subject_id = '$subject_id',
        teacher_id = '$teacher_id',
        week_day = '$week_day',
        lession = '$lession',
        notes = ?
    WHERE id = '$schedule_id'";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $notes);
    $stmt->execute();

return true;
    return true;
}

function delete_schedule($params) //DELETE
{
    global $connection;

    $sql  = "DELETE FROM `schedules`
            WHERE ...";

    /*
    ....
    */
    return true;
}
