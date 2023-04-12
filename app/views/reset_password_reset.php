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
            <h2 class="card-title">Các yêu cầu reset password</h2>
        </div>
        <div class="row">

        </div>
        <footer class="pt-1 my-md-5 pt-md-5 border-top">
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên người dùng</th>
                            <th scope="col">Mật khẩu mới</th>
                            <th scope="col">Action</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($get_all_admin_reset as $arrs) {
                        ?>
                            <form method="POST" action="reset_password_reset.php?id=<?php echo $arrs['login_id']; ?>">
                                <tr>

                                    <th><?php echo $arrs["id"]; ?></th>
                                    <th><?php echo $arrs["login_id"]; ?></th>
                                    <th>
                                        <input type="password" name="<?php echo $arrs["login_id"] ?>" placeholder="******" />
                                    </th>
                                    <th>
                                        <button type="submit" name="reset" class="btn btn-primary">Reset</button>
                                    </th>
                                    <?php
                                    if (!empty($_GET['id'])) {
                                        echo '<th class="text-danger">';
                                        if (!empty($errorsMissing['required']) && $_GET['id'] == $arrs['login_id']) {
                                            echo $errorsMissing['required']. "</br>"; 
                                        }
                                        if (!empty($errorsMissing['minlength']) && $_GET['id'] == $arrs['login_id']) {
                                            echo $errorsMissing['minlength'];
                                        }
                                        echo '</th>';
                                    }
                                    ?>
                                </tr>
                            </form>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </footer>
    </div>
</body>

</html>