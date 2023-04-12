<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Login</title>
    <style>
        .background {
            padding: 50px;
            background-color: #ff5a60 !important;
            height: 100%;
            display: flex;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .img-bg {
            margin: auto;
            max-height: 100%;
            content: url('assets/img/Illustration.png');
        }

        .right {
            float: right !important;
            padding-left: 0px !important;
            padding-right: 0px !important;
            min-height: 100vh !important;
        }

        .left {
            float: left !important;
            padding-left: 0px !important;
            padding-right: 0px !important;
        }


        .body-screen {
            display: flex;
            justify-content: center;
        }

        .body {
            background-color: white;
            padding-bottom: 30px;
            border-radius: 20px;
            width: 96%;
        }

        .bg {
            background-color: #f0f1f9;
        }
    </style>
</head>

<body>
    <div class='row bg'>
        <div class='col-lg-6 d-none d-lg-flex d-md-none left'>
            <div class='background'>
                <img alt='alt' class='img-bg' />
            </div>
        </div>
        <div class="col-md-12 col-12 col-lg-6 right ">
            <div class="shadow-md">
                <div class="row m-5 body-screen ">
                    <form action="login.php" method="post" class="body m-3 p-3">
                        <h3 class="text-center mt-3">Đăng nhập</h3>
                        <div class="form-group">
                            <input class="form-control form-control-lg" placeholder="Người dùng" type="text" name="login_id" class="input-label" placeholder="" autofocus value="<?php echo isset($_POST["login_id"]) ? $_POST["login_id"] : ''; ?>">
                        </div>
                        <div class="">
                            <label style="color: red">
                                <?php
                                echo $errors['login_id'];
                                ?>
                            </label>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" placeholder="**********" type="password" name="password" class="input-label" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>">
                        </div>
                        <div class="">
                            <label style="color: red">
                                <?php
                                echo $errors['password'];
                                ?>
                            </label>
                        </div>
                        <!-- forget password -->
                        <div class="form-group">
                            <a href="reset_password_request.php" class="float-right mb-4 pb-4">Quên mật khẩu</a>
                            <div class="form-group mt-3">
                                <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg">Đăng nhập</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>