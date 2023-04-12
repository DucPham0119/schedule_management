<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Sửa thông tin giáo viên</title>
</head>

<body>

    <?php
    include '../common/navbar.php';
    ?>
    <div class="container">
        <h1 class="text-center mt-5">Sửa thời khóa biểu</h1>
        <form action="../controller/teacher_edit_confirm.php?edit_teacher=<?php echo $teacher_info['id'];?>" method="post" class="mt-5 mb-5 border border-primary rounded p-5">
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="name">Họ và tên</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="teacher_name" value="<?= $_SESSION['teacher_name']?>" readonly>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="teacher_specialized">Bộ môn</label>
                <div class="col-sm-6">
                    <?php $specialized = constant('SPECIALIZED');?>
                    <input type="text" class="form-control" id="teacher_specialized" name="teacher_specialized_visible" value="<?= $specialized[$_SESSION['teacher_specialized']]?>" readonly>
                    <input type="hidden" id="teacher_specialized" name="teacher_specialized" value="<?=$_SESSION['teacher_specialized']?>">
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="teacher_degree">Học vị</label>
                <div class="col-sm-6">
                    <?php $degree = constant('DEGREE');?>
                    <input type="text" class="form-control" id="teacher_degree" name="teacher_degree_visible" value="<?= $degree[$_SESSION['teacher_degree']]?>" readonly>
                    <input type="hidden" id="teacher_degree" name="teacher_degree" value="<?=$_SESSION['teacher_degree']?>">
                </div>
            </div>
            <?php
            if (empty($_SESSION['teacher_avatar'])){
            ?>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="file" class="form__label">
                    Avatar
                </label>
                <div class="col-sm-6">
                    <div class="input-group mb-3">
                        <img style=" height: 150px; width: 150px" src="../../assets/avatar/teacher/<?= $teacher_info['id']?>/<?= $teacher_info['avatar']?>" alt="avatar">
                    </div>
                </div>
            </div>
            <?php
            }else{
            ?>
                <div class="form-group row mt-4">
                    <label class="col-sm-2" for="file" class="form__label">
                        Avatar
                    </label>
                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <img style=" height: 150px; width: 150px" src="../../assets/avatar/tmp/<?= $_SESSION['teacher_avatar']?>"  alt="avatar">
                            <input type="hidden" name="teacher_avatar" value="<?=$_SESSION['teacher_avatar']?>">
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="note">Mô tả thêm</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="note" name="teacher_note" rows="5" readonly><?= $_SESSION['teacher_note'];?></textarea>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-around">
                <button type="submit" class="btn btn-primary btn-lg pe-5 ps-5" name="teacher_edit_fix">Sửa lại</button>
                <button type="submit" class="btn btn-primary btn-lg pe-5 ps-5" name="teacher_edit_confirm">Đăng kí</button>
            </div>
        </form>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>