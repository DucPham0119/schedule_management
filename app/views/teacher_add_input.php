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
        <h1 class="text-center my-3">Thêm mới giáo viên</h1>
        <form enctype="multipart/form-data" action="teacher_add_input.php" method="post" class="border border-primary rounded p-3">
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="teacher_name">Họ và tên</label>
                <div class="col-sm-6">
                    <input value="<?php echo $data['teacher_name']; ?>" type="text" class="form-control" id="teacher_name" name="teacher_name">

                    <span class="text-danger font-weight-bold">
                        <b><?php echo $errorsMissing['teacher_name']; ?></b>
                    </span>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="specialized">Bộ môn</label>
                <div class="col-sm-6">

                    <select id="specialized" class="form-control" name="specialized">
                        <option <?php empty($data['specialized']) ? "selected" : "" ?> value="">
                            Chọn bộ môn
                        </option>
                        <?php
                        $specialized = constant('SPECIALIZED');
                        foreach ($specialized as $key => $value) {
                            $selected = $key == intval($data['specialized']) ? "selected" : ""
                        ?>
                            <option <?php echo $selected; ?> value="<?= $key ?>"><?= $value ?></option>
                        <?php
                        }
                        ?>
                    </select>

                    <span class="text-danger font-weight-bold">
                        <b><?php echo $errorsMissing['specialized']; ?></b>
                    </span>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="degree">Học vị</label>
                <div class="col-sm-6">

                    <select id="degree" class="form-control" name="degree">
                        <option <?php empty($data['degree']) ? "selected" : "" ?> value="">
                            Chọn học vị
                        </option>
                        <?php
                        $degree = constant('DEGREE');
                        foreach ($degree as $key => $value) {
                            $selected = $key == intval($data['degree']) ? "selected" : ""
                        ?>
                            <option <?php echo $selected; ?> value="<?= $key ?>"><?= $value ?></option>
                        <?php
                        }
                        ?>
                    </select>

                    <span class="text-danger font-weight-bold">
                        <b><?php echo $errorsMissing['degree']; ?></b>
                    </span>
                </div>
            </div>

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="file" class="form__label">
                    Avatar
                </label>
                <div class="col-sm-6">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="file" name="teacher_image" border-width accept=".jpg, .png">
                    </div>

                    <span class="text-info font-weight-bold">
                        <b><?php echo $data['teacher_image']; ?></b>
                    </span>
                    <span class="text-danger font-weight-bold">
                        <b><?php echo $errorsMissing['teacher_image']; ?></b>
                    </span>
                </div>

            </div>

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="info">Mô tả thêm</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="info" rows="5" name="note"><?php echo $data['note']; ?></textarea>
                    <span class="text-danger font-weight-bold">
                        <b><?php echo $errorsMissing['note']; ?></b>
                    </span>
                </div>
            </div>

            <div class="mt-5 d-flex justify-content-center">
                <button type="submit" name="add_teacher" class="btn btn-primary btn-lg pe-5 ps-5">Xác nhận</button>
            </div>
        </form>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>