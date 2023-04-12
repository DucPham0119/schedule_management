<?php

// CRUD

function add_admin() //CREATE
{
    global $connection;

    return true;
}

function check_admin_login_id($login_id)
{
    global $connection;

    $sql  = "SELECT * FROM `admins` 
            WHERE login_id = ?";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $login_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);

    if (count($row) != 0) {
        return true;
    }
    else {
        return false;
    }
}

function update_microtime_request_password($login_id)
{
    global $connection;

    $get_mictime = microtime(true);

    $sql = "UPDATE `admins`
            SET reset_password_token = '$get_mictime'
            WHERE login_id = ?";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $login_id);
    $stmt->execute();

    return true;
}

function get_admin_reset_token_not_empty()
{
    global $connection;

    $sql  = "SELECT * FROM `admins` WHERE CHAR_LENGTH(reset_password_token) > 0";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

function get_admins($login_id, $password) //READ
{
    global $connection;
    $pass_encrypt_md5 = md5($password);
    $sql  = "SELECT * FROM `admins` 
            WHERE login_id = ? AND password = '$pass_encrypt_md5' AND actived_flag > 0";

    // $result = $connection->query($sql);
    // $row = $result->fetch_array(MYSQLI_ASSOC);

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $login_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);

    return $row;
}

function edit_admin($login_id, $password) //UPDATE
{
    global $connection;
    $passmd5 = md5($password);
    $sql = "UPDATE `admins`
            SET password = '$passmd5',
            reset_password_token = ''
            WHERE login_id = '$login_id'";
    $connection->query($sql);
    return true;
}

function delete_admin($login_id) //DELETE
{
    global $connection;

    $sql  = "DELETE FROM `table`
            WHERE login_id = '$login_id'";

    return true;
}
