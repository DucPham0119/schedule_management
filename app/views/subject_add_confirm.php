<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Thêm mới môn học</title>
</head>

<body>

<?php
include '../common/navbar.php';
include '../common/define.php';

?>
<div class="container">
    <h1 class="text-center my-3">Xác nhận thêm mới môn học</h1>
    <form action="../controller/subject_add_confirm.php" method="post" class="border border-primary rounded p-3">
        <div class="form-group row mt-4">
            <label class="col-sm-2" for="subject_name">Tên môn học</label>
            <div class="col-sm-6">
                <input class="form-control" id="subject_name" name="subject_name" value="<?= $_SESSION['subject_name'];?>" readonly>
            </div>
        </div>
        <div class="form-group row mt-4">
            <label class="col-sm-2" for="school_year">Khóa</label>
            <div class="col-sm-6">
                <?php $school_year = constant('YEAR'); ?>
                <input class="form-control" id="school_year" name="school_year_visible" value="<?= $school_year[$_SESSION['school_year']];?>" readonly>
                <input class="form-control" type="hidden" id="school_year" name="school_year" value="<?= $_SESSION['school_year'];?>">
            </div>
        </div>

        <div class="form-group row mt-4">
            <label class="col-sm-2" for="subject_note">Mô tả </label>
            <div class="col-sm-8">
                <textarea class="form-control" id="subject_note" rows="5" name="subject_note" readonly ><?=  $_SESSION['subject_note'];?></textarea>
            </div>
        </div>

        <div class="form-group row mt-4">
            <label class="col-sm-2" for="file" class="form__label">
                Avatar
            </label>
            <div class="col-sm-6">
                <img style="height: 150px; width: 150px" src="../../assets/avatar/tmp/<?= $_SESSION['subject_avatar']?>" alt="Avatar">
                <input type="hidden" id="file" name="subject_avatar" value="<?= $_SESSION['subject_avatar']?>">
            </div>
        </div>

        <div class="mt-5 d-flex justify-content-around">
            <a href="../controller/subject_add_input.php" class="btn btn-primary btn-lg pe-5 ps-5">Sửa lại</a>
            <button type="submit" class="btn btn-primary btn-lg pe-5 ps-5" name="confirm_subject_add">Đăng kí</button>
        </div>
    </form>
</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>