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
        <h1 class="text-center mt-5">Sửa thông tin giáo viên</h1>
        <form action="../controller/teacher_edit_input.php?edit_teacher=<?php echo $teacher_info['id'];?>" method="post" enctype="multipart/form-data" class="mt-5 mb-5 border border-primary rounded p-5">
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="name">Họ và tên</label>
                <div class="col-sm-6">
                    <?php
                    if (isset($_SESSION['teacher_name'])){
                        $value_teacher_name = $_SESSION['teacher_name'];
                    }
                    else{
                        $value_teacher_name = $teacher_info['name'];
                    }
                    ?>
                    <input type="text" class="form-control" id="name" name="teacher_name" value="<?= $value_teacher_name;?>">
                    <span class="text-danger font-weight-bold">
                    <?php
                        echo isset($error['teacher_name_empty']) ? $error['teacher_name_empty'] : '';
                        echo isset($error['teacher_name_length']) ? $error['teacher_name_length'] : '';
                    ?>
                    </span>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="teacher_specialized">Bộ môn</label>
                <div class="col-sm-6">
                    <select id="teacher_specialized" class="form-control" name="teacher_specialized">
                        <option value="">
                            <--- Chọn bộ môn --->
                        </option>
                        <?php
                        if (isset($_SESSION['teacher_specialized'])){
                            $key_teacher_specialized = $_SESSION['teacher_specialized'];
                        }
                        else{
                            $key_teacher_specialized = $teacher_info['specialized'];
                        }

                        $specialized = constant('SPECIALIZED');
                        foreach ($specialized as $key => $value){
                            $selected = ($key == $key_teacher_specialized ? "selected" : "");
                        ?>
                            <option <?php echo $selected; ?> value="<?=$key?>"><?= $value ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <span class="text-danger font-weight-bold">
                    <?php
                        echo isset($error['teacher_specialized_empty']) ? $error['teacher_specialized_empty'] : '';
                    ?>
                    </span>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="teacher_degree">Học vị</label>
                <div class="col-sm-6">
                    <select id="teacher_degree" class="form-control" name="teacher_degree">
                        <option <?php ?> value="">
                            <--- Chọn học vị --->
                        </option>
                        <?php
                        if (isset($_SESSION['teacher_degree'])){
                            $key_teacher_degree = $_SESSION['teacher_degree'];
                        }
                        else{
                            $key_teacher_degree = $teacher_info['degree'];
                        }

                        $degree = constant('DEGREE');
                        foreach ($degree as $key => $value){
                            $selected = ($key == $key_teacher_degree ? "selected" : "");
                        ?>
                            <option <?php echo $selected?> value="<?= $key ?>"> <?= $value ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                    <span class="text-danger font-weight-bold">
                    <?php
                        echo isset($error['teacher_degree_empty']) ? $error['teacher_degree_empty'] : '';
                    ?>
                    </span>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="teacher_avatar" class="form__label">
                    Avatar
                </label>
                <div class="col-sm-6">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="teacher_avatar" name="teacher_avatar" border-width>
<!--                        <input type="hidden" id="teacher_avatar" name="updated_teacher_avatar" value="--><?//= $teacher_info['avatar'] ?><!--">-->

                    </div>
                    <span class="text-danger font-weight-bold">
                        <?php
                        echo isset($error['teacher_avatar_empty']) ? $error['teacher_avatar_empty'] : '';
                        ?>
                    </span>
                    <?php
                    if (! isset($_SESSION['teacher_avatar'])){
                    ?>
                        <img style=" height: 150px; width: 150px" src="../../assets/avatar/teacher/<?= $teacher_info['id'] . "/" . $teacher_info['avatar'] ?>" alt="Avatar">
                    <?php
                    }
                    else{
                        ?>
                        <img style=" height: 150px; width: 150px" src="../../assets/avatar/tmp/<?= $_SESSION['teacher_avatar'];?>" alt="Avatar">
                    <?php
                    }
                    ?>
                </div>

            </div>

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="note">Mô tả thêm</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="note" rows="5" name="teacher_note" ><?= $teacher_info['description']?></textarea>
                    <span class="text-danger font-weight-bold">
                    <?php
                        echo isset($error['teacher_note_empty']) ? $error['teacher_note_empty'] : '';
                        echo isset($error['teacher_note_length']) ? $error['teacher_note_length'] : '';
                    ?>
                    </span>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg pe-5 ps-5" name="teacher_edit_submit">Xác nhận</button>
            </div>
        </form>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>