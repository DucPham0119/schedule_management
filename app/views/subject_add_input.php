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
    <h1 class="text-center my-3">Thêm mới môn học</h1>
    <form action="../controller/subject_add_input.php" method="post" enctype="multipart/form-data" class="border border-primary rounded p-3">

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="subject_name">Tên môn học</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="subject_name" name="subject_name" value="<?= isset($_SESSION['subject_name']) ? $_SESSION['subject_name'] : '';?>">
                    <span class="text-danger font-weight-bold">
                        <?php
                        echo isset($error['subject_name_empty']) ? $error['subject_name_empty'] : '';
                        echo isset($error['subject_name_length']) ? $error['subject_name_length'] : '';
                        ?>
                    </span>
                </div>
            </div>

        <div class="form-group row mt-4">
            <label class="col-sm-2" for="school_year">Khóa</label>
            <div class="col-sm-6">
                <select id="school_year" class="form-control" name="school_year">
                    <option <?php empty($_SESSION['school_year']) ? "selected" : "" ?> value="">
                        <--- Chọn năm học--->
                    </option>
                    <?php
                    $school_year = constant('YEAR');
                    foreach ($school_year as $key => $value) {
                        $selected = ($key == $_SESSION['school_year'] ? "selected" : "");
                    ?>
                        <option <?php echo $selected; ?> value="<?= $key ?>"><?= $value ?></option>
                        <?php
                    }
                    ?>
                </select>
                <span class="text-danger font-weight-bold">
                    <?php
                    echo isset($error['school_year_empty']) ? $error['school_year_empty'] : '';
                    ?>
                </span>
            </div>
        </div>

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="subject_note">Mô tả </label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="subject_note" rows="5" name="subject_note" ><?= isset($_SESSION['subject_note']) ? $_SESSION['subject_note'] : '';?></textarea>
                    <span class="text-danger font-weight-bold">
                        <?php
                        echo isset($error['subject_note_empty']) ? $error['subject_note_empty'] : '';
                        echo isset($error['subject_note_length']) ? $error['subject_note_length'] : '';
                        ?>
                    </span>
                </div>
            </div>

            <?php
            if (isset($_SESSION['subject_avatar'])){
                ?>
                <div class="form-group row mt-4">
                    <label class="col-sm-2" for="file" class="form__label">
                        Avatar
                    </label>
                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="file" name="subject_avatar" >
                        </div>
                        <input type="hidden"id="file" name="old_subject_avatar" value="<?= isset($_SESSION['subject_avatar']) ? $_SESSION['subject_avatar'] : '';?>">
                        <img style="height: 150px; width: 150px" src="../../assets/avatar/tmp/<?= $_SESSION['subject_avatar'];?>" alt="Avatar">
                    </div>
                </div>
                <?php
            }
            else{
                ?>
                <div class="form-group row mt-4">
                    <label class="col-sm-2" for="file" class="form__label">
                        Avatar
                    </label>
                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="file" name="subject_avatar" border-width ">
                        </div>
                        <span class="text-danger font-weight-bold">
                            <?php
                            echo isset($error['subject_avatar_empty']) ? $error['subject_avatar_empty'] : '';
                            ?>
                        </span>
                    </div>

                </div>
                <?php
            }
            ?>
            <div class="mt-5 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg pe-5 ps-5" name="submit_subject_add">Xác nhận</button>
            </div>
        </form>

</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>