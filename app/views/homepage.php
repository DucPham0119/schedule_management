<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Trang chủ</title>
    <style>
        .list-group-item-custom {
            cursor: pointer;
        }

        .list-group-item-custom:hover {
            background-color: rgba(0, 0, 0, 0.175);
        }
    </style>
</head>

<body>
    <?php
    include '../common/navbar.php';
    ?>
    <div class="container">
        <div class="card-body">
            <h2 class="card-title">Thời khóa biểu</h2>
            <p class="card-text mb-4">Tra cứ thông tin về thời khóa biểu môn học</p>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Giảng viên</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-custom">
                            <a href="teacher_search.php">Tìm kiếm</a>
                        </li>
                        <li class="list-group-item list-group-item-custom">
                            <a href="teacher_add_input.php">Thêm mới</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5> Môn học</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-custom">
                            <a href="subject_search.php">Tìm kiếm</a>
                        </li>
                        <li class="list-group-item list-group-item-custom">
                            <a href="subject_add_input.php">Thêm mới</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Thời khóa biểu</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-custom">
                            <a href="schedule_search.php">Tìm kiếm</a>
                        </li>
                        <li class="list-group-item list-group-item-custom">
                            <a href="schedule_add_input.php">Thêm mới</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-4 mt-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Admin</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-custom">
                            <a href="reset_password_reset.php">Yêu cầu reset password</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">

            </div>
        </footer>
    </div>
</body>

</html>