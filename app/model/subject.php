<?php
include_once "../common/database.php";
// CRUD

date_default_timezone_set('Asia/Ho_Chi_Minh');

function add_subject($subject_name, $school_year, $subject_note, $subject_avatar) //CREAT
{
    global $connection;

    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO subjects (name, avatar, description, school_year, created)
    VALUES (?, ?, ?, '{$school_year}', '{$date}')";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $subject_name, $subject_avatar, $subject_note);
    $stmt->execute();

    return true;
}

function get_all_subjects() //READ
{
    global $connection;

    $sql  = "SELECT * FROM subjects ORDER BY subjects.id DESC";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $row;
}

function get_subject_name_by_id($id) //READ
{
    global $connection;

    $sql  = "SELECT name FROM subjects WHERE id = '$id'";

    $result = $connection->query($sql);
    $row = mysqli_fetch_assoc($result);

    return $row;
}

function search_subjects_by_year_and_keyword($school_year, $keyword) //READ
{
    global $connection;

    $sql  = "SELECT * FROM subjects WHERE subjects.school_year = '$school_year' 
    AND (subjects.name LIKE ? OR subjects.description LIKE ?) ORDER BY subjects.id DESC";

    $keyword = "%$keyword%";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $keyword, $keyword);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);

    return $row;
}

function search_subjects_by_year($school_year) //READ
{
    global $connection;

    $sql  = "SELECT * FROM subjects WHERE subjects.school_year = '$school_year' ORDER BY subjects.id DESC";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $row;
}

function search_subjects_by_keyword($keyword) //READ
{
    global $connection;

    $sql  = "SELECT * FROM subjects WHERE subjects.name LIKE ? OR subjects.description LIKE ? ORDER BY subjects.id DESC";

    $keyword = "%$keyword%";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $keyword, $keyword);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);

    return $row;
}

function edit_subject($id, $subject_name, $subject_year, $subject_note, $subject_avatar) //UPDATE
{
    global $connection;

    $date = date("Y-m-d H:i:s");

    $sql = "UPDATE subjects
            SET name = ?,
            avatar = ?,
            description = ?,
            school_year = '$subject_year',
            updated = '$date'
            WHERE id = $id";
    
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $subject_name, $subject_avatar, $subject_note);
    $stmt->execute();

    return true;
}

function delete_subject($id) //DELETE
{
    global $connection;

    $sql  = "DELETE FROM subjects
            WHERE subjects.id=$id";
    $connection->query($sql);

    return true;
}

/**
 * @return mixed
 */
function get_last_subject_id()
{
    global $connection;

    $last_id = $connection->insert_id;

    return $last_id;
}

function get_subject_by_id($id) //READ
{
    global $connection;

    $sql  = "SELECT * FROM subjects WHERE subjects.id = $id  LIMIT 1";

    $result = $connection->query($sql);
    $row = mysqli_fetch_assoc($result);

    return $row;
}
