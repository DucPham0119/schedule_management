<?php
    include './common.php';
    include '../common/database.php'; // database kết nối -> bắt buộc mọi controller phải có dòng này
    include '../model/teacher.php'; 
    include '../common/define.php';

    
    $teacher_name = $_SESSION['teacher_name'];
    $specialized = $_SESSION['specialized'];
    $degree = $_SESSION['degree'];
    $note = $_SESSION['note'];
    $teacher_image = $_SESSION['teacher_image'];
    $file_path = $_SESSION['file_path'];
    $data = array('teacher_name' => $teacher_name, 'specialized' => $specialized,'degree'=>$degree, 'note' => $note, 'teacher_image' => $file_path);
    
    if (isset($_POST['confirm_teacher'])) {
        if (add_teacher($teacher_name, $specialized, $degree, $teacher_image, $note)){
            $id = get_last_id();
            $path = "../../assets/avatar/teacher/";
            if (!file_exists($path)) {
                mkdir($path, 0700);
            }
            $target_dir = $path."{$id}"."/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0700);
            }
            $target_file = $target_dir . basename($teacher_image);
            copy($file_path, $target_file);
            $status = unlink($file_path);
            if($status){
                unset($_SESSION['teacher_name']);
                unset($_SESSION['specialized']);
                unset($_SESSION['degree']);
                unset($_SESSION['note']);
                unset($_SESSION['teacher_image']);
                unset($_SESSION['file_path']);
                // include_once "../views/teacher_add_complete.php";
                header('Location: ./teacher_add_complete.php');
            }else {
                include_once "../views/teacher_add_confirm.php";
            }
            
        } else {
            include_once "../views/teacher_add_confirm.php";
        }
        
    }elseif (isset($_POST['confirm_teacher_edit'])){
        header('Location: ./teacher_add_input.php');
    }  else {
        include_once "../views/teacher_add_confirm.php";
    }
?>