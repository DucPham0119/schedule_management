 <div class="justify-content-between d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
     <div class="my-0 mr-md-auto font-weight-normal">
         <div class="d-flex">
             <span class="mb-1">Tên login <b><?php if (isset($_SESSION['username'])) {
                                                    echo $_SESSION['username'];
                                                } ?></b> </span>
         </div>
         <span>Thời gian login: <b> <?php if (isset($_SESSION['timelogin'])) {
                                        echo $_SESSION['timelogin'];
                                    } ?></b></span>
     </div>
     <nav class="my-2 my-md-0 mr-md-3">
         <!-- <a class="p-2 text-dark" href="#">Giảng viên</a>
         <a class="p-2 text-dark" href="../views/subject_add_input.php">Môn học</a>
         <a class="p-2 text-dark" href="#">Thời khóa biểu</a> -->
     </nav>
     <div class="d-flex">
         <div class="user_logout">
             <!-- logout in php -->
             <form action="logout.php" method="post">
                 <button type="submit" name="logout" class="btn btn-danger">Đăng xuất</button>
             </form>
         </div>
     </div>
 </div>