<?php
include '../controller/common.php'; // common kiem tra session
include '../common/database.php'; // database kết nối -> bắt buộc mọi controller phải có dòng này
include '../model/teacher.php';
include '../common/define.php';

$teacher_info = get_teacher_by_id($_GET['edit_teacher']);

if (isset($_POST['teacher_edit_confirm'])){
    if (isset($_POST['teacher_avatar'])){

        $teacher_name = $_POST['teacher_name'];
        $teacher_speicalized = $_POST['teacher_specialized'];
        $teacher_degree = $_POST['teacher_degree'];
        $teacher_note = $_POST['teacher_note'];
        $teacher_avatar = $_POST['teacher_avatar'];

        if (edit_teacher_by_id($teacher_info['id'], $teacher_name, $teacher_avatar, $teacher_note, $teacher_speicalized, $teacher_degree)){
            // đây là phần edit nên đúng ra sẽ có sẵn file chứa ảnh rồi, nhưng thôi cứ để nhé.
            $dir = "../../assets/avatar/teacher/{$teacher_info['id']}";
            if (! file_exists($dir)){
                mkdir($dir, 0700);
            }

            //xóa ảnh cũ
            $old_file_path = "../../assets/avatar/teacher/{$teacher_info['id']}/{$teacher_info['avatar']}";
            if (unlink($old_file_path)){

            }else{
                $error['unlink'] = 'Không xóa được';

                header('Location:teacher_edit_input.php');
            }

            //copy file ảnh từ file tạm thời sang file chứa ảnh + xóa ảnh ở file tạm thời
            $file_path_from = "../../assets/avatar/tmp/{$_SESSION['teacher_avatar']}";
            $file_path_to = "../../assets/avatar/teacher/{$teacher_info['id']}/{$_SESSION['teacher_avatar']}";
            copy($file_path_from, $file_path_to);
            if (unlink($file_path_from) ){
                unset($_SESSION['teacher_name']);
                unset($_SESSION['teacher_specialized']);
                unset($_SESSION['teacher_note']);
                unset($_SESSION['teacher_avatar']);
                unset($_SESSION['teacher_degree']);

                header('Location:teacher_edit_complete.php');
            }else{
                $error['unlink'] = 'Không xóa được';

                header('Location:teacher_edit_input.php?edit_teacher='.$teacher_info['id']);
            }
        }

    }
    else{
        $teacher_name = $_POST['teacher_name'];
        $teacher_speicalized = $_POST['teacher_specialized'];
        $teacher_degree = $_POST['teacher_degree'];
        $teacher_note = $_POST['teacher_note'];
        $teacher_avatar = $teacher_info['avatar'];

        if (edit_teacher_by_id($teacher_info['id'], $teacher_name, $teacher_avatar, $teacher_note, $teacher_speicalized, $teacher_degree)){
            unset($_SESSION['teacher_name']);
            unset($_SESSION['teacher_specialized']);
            unset($_SESSION['teacher_note']);
            unset($_SESSION['teacher_avatar']);
            unset($_SESSION['teacher_degree']);

            header('Location:teacher_edit_complete.php');
        }
    }

}elseif (isset($_POST['teacher_edit_fix'])){
    if (isset($_POST['teacher_avatar'])){
        $_SESSION['teacher_name'] = $_POST['teacher_name'];
        $_SESSION['teacher_specialized'] = $_POST['teacher_specialized'];
        $_SESSION['teacher_degree'] = $_POST['teacher_degree'];
        $_SESSION['teacher_note'] = $_POST['teacher_note'];
        $_SESSION['teacher_avatar'] = $_POST['teacher_avatar'];

        header('Location:teacher_edit_input.php?edit_teacher='.$teacher_info['id']);
    }
    else{
        $_SESSION['teacher_name'] = $_POST['teacher_name'];
        $_SESSION['teacher_specialized'] = $_POST['teacher_specialized'];
        $_SESSION['teacher_degree'] = $_POST['teacher_degree'];
        $_SESSION['teacher_note'] = $_POST['teacher_note'];

        header('Location:teacher_edit_input.php?edit_teacher='.$teacher_info['id']);
    }
}else{
    include '../views/teacher_edit_confirm.php';
}

?>
