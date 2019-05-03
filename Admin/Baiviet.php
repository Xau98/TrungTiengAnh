 <!DOCTYPE html>
<?php

$conn = mysqli_connect('localhost', 'root', '', 'trungtam')or die("can't connect database");
mysqli_set_charset($conn, "utf8");
$sql = "SELECT * FROM admin where Id='1' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<html>
    <head>
        <title>Trang quản trị</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Css/Quantri.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <div id="quantri">
            <div id="left">
                <div id="account">
                    <div id="img">  <img src=<?php echo $row['Img']; ?> width="250" height="250" alt="Anh dai dien"></div>
                    <form method="post" enctype="multipart/form-data">
                        <input type="file" name="up_load"style="padding-top: 5px;" > 
                        <button type="submit" name="sub_up_load"  >Cập nhật Avata</button></form> 
                    <div id="ten">Xin chào :<strong> <?php echo $row['Ten']; ?></strong> </div>
                </div> 
                <div id="menu">

                    <ul id ="lu">
                        <li id ="li">
                            <a href="Danhmuc.php">Danh mục</a>
                        </li>  
                        <li id ="li">
                            <a href="Lophoc.php">Thông tin lớp học</a> 
                        </li>
                        <li id ="li">
                            <a href="Giaovien.php">Thông tin giáo viên</a> 
                        </li>
                        <li id ="li">
                            <a href="Hocvien.php">Thông tin học viên</a> 
                        </li>
                        <li id ="li">
                            <a href="Phuhuynh.php">Thông tin phụ huynh</a> 
                        </li> 
                        <li id ="li">
                            <a href="">Bài viết</a> 
                        </li>  
                        <li id ="li">
                            <a href="Lienhe.php">Liên hệ </a> 
                        </li>  
                        <li id ="li">
                            <a href="Cauhinh.php">Cấu hình</a>
                        </li >  
                        <li id ="li">
                            <a href="Quantri.php?Id=".<?php echo $row['Id']?>>Tài khoản </a> 
                        </li> 
                        <li id ="li">
                            <a href="Doimk.php">Đổi mật khẩu</a>
                        </li>  
                        <li id ="li">
                            <a href="index.php">Đăng xuất</a> 
                        </li>  
                    </ul>  
                </div>
            </div>
            <!--                        <li><a href="">Học viên</a>
                            <ul id="ulcon">
                                <li ><a href="">Thông tin</a> </li>
                                <li><a href="">Li150</a> </li>
                            </ul>
                        </li>  
            -->
            <?php
            if (isset($_POST['sub_up_load'])) {
                $file_part = $_FILES['up_load']['name'];
                move_uploaded_file($_FILES['up_load']['tmp_name'], "Img/" . $file_part);
                $sql_up_anh = "update admin set Img='Img/" . $file_part . "' where Id='" . $row['Id'] . "'";
                mysqli_query($conn, $sql_up_anh);
            }
            ?> 
<!-- right -->
                <div id="right">
Bài viết

                </div>

                     </div>

                </body>
        </html>


