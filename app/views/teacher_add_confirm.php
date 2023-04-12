<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Thêm mới giáo viên</title>
</head>

<body>

    <?php
    include '../common/navbar.php';
    ?>
    <div class="container">
        <h1 class="text-center my-3">Xác nhận thêm mới giáo viên</h1>
        <form action="teacher_add_confirm.php" method="post" class="border border-primary rounded p-3">
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="teacher_name">Họ và tên</label>
                <div class="col-sm-6">
                    <?php echo $data['teacher_name']; ?>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="specialized">Bộ môn</label>
                <div class="col-sm-6">
                    <?php $specialized = constant('SPECIALIZED');
                    echo $specialized[$data['specialized']]; ?>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="degree">Học vị</label>
                <div class="col-sm-6">
                    <?php $degree = constant('DEGREE');
                    echo $degree[$data['degree']]; ?>
                </div>
            </div>

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="file" class="form__label">
                    Avatar
                </label>
                <div class="col-sm-6">
                    <img src="<?php echo $data['teacher_image'];?>" alt="" width="150" height="150">
                </div>

            </div>

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="info">Mô tả </label>
                <div class="col-sm-8">
                    <!-- <?php echo $data['note']; ?> -->
                    <textarea class="form-control" id="info" rows="5" name="note" disabled><?php echo $data['note']; ?></textarea>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-around">
                <!-- <a href="teacher_add_input.php" class="btn btn-primary btn-lg pe-5 ps-5">Sửa lại</a> -->
                <button type="submit" name="confirm_teacher_edit" class="btn btn-primary btn-lg pe-5 ps-5">Sửa lại</button>
                <button type="submit" name="confirm_teacher" class="btn btn-primary btn-lg pe-5 ps-5">Đăng kí</button>
            </div>
        </form>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>