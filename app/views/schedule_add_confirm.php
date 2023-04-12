<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Tạo thời khóa biểu</title>
</head>

<body>

    <div class="container">
        <h1 class="text-center mt-5">Tạo thời khóa biểu</h1>
        <form action="schedule_add_confirm.php" method="post" class="mt-5 mb-5 border border-primary rounded p-5">
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="year">Khóa học</label>
                <div class="col-sm-6">
                    <?php $school_year = constant('YEAR')?>
                    <input class="form-control" id="school_year" name="school_year_visible" value="<?=  $school_year[$_SESSION['school_year']]; ?>" readonly>

                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="subject">Môn học</label>
                <div class="col-sm-6">
                    <?php foreach ($subjects as $subject){
                            if ($subject['id'] == $_SESSION['subject_id']){?>
                                <input class="form-control" id="subject" name="subject_id" value="<?= $subject['name']; ?>" readonly>
                    <?php
                            }
                    }
                    ?>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="teacher">Giáo viên</label>
                <div class="col-sm-6">
                    <?php foreach ($teachers as $teacher){
                        if ($teacher['id'] == $_SESSION['teacher_id']){?>
                            <input class="form-control" id="teacher" name="teacher_id" value="<?= $teacher['name']; ?>" readonly>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="weekday">Thứ</label>
                <div class="col-sm-6">
                    <input class="form-control" id="lession" name="week_day_visible" value=" <?= $_SESSION['week_day']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="lession">Tiết</label>
                <div class="col-sm-10 d-flex ">
                    <?php
                    foreach ($_SESSION['lession'] as $key => $value){
                    ?>
                    <p class='me-4' >
                        Tiết <?= $value; ?>
                    </p>
                    <?php
                    } ?>
                </div>
            </div>

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="note">Chú ý</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="notes" rows="5" name="notes" readonly><?=  $_SESSION['notes']; ?></textarea>

                </div>
            </div>
            <div class="mt-5 d-flex justify-content-around">
                <a href="../controller/schedule_add_input.php" class="btn btn-primary btn-lg pe-5 ps-5">Sửa lại</a>
                <button type="submit" class="btn btn-primary btn-lg pe-5 ps-5" name="confirm_add">Đăng kí</button>
            </div>
        </form>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>