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
                            <a href="Baiviet.php">Bài viết</a> 
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
                            <a href="">Đổi mật khẩu</a>
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
       
         <div  style="height: 600px; margin-left: 400px; margin-top: 40px;">
    <form style=" text-align: center;" method="post">
    <table style="width: 500px; height:500px;background: #66ff66;  border: 2px #000000 solid;">
        <tr  >
            <td colspan="2"><strong>Thiết lập tài khoản</strong> </td>
        </tr>
         <tr>
            <td>Mã Admin:</td>
            <td><input type="text" name="madmin" value="<?php echo $row['Id']; ?>"></td>
        </tr>
        <tr>
            <td>Tên Admin :</td>
            <td><input type="text" name="tadmin" value="<?php echo $row['Ten']; ?>"></td>
        </tr> 
        <tr>
            <td>Địa chỉ :</td>
            <td><input type="text" name="dc" value="<?php echo $row['Diachi']; ?>"></td>
        </tr>
        <tr>
            <td>Số điện thoại :</td>
            <td><input type="number" name="sdt" value="<?php echo $row['Sdt']; ?>"></td>
        </tr>
        <tr>
            <td>Email :</td>
            <td><input type="email" name="email" value="<?php echo $row['Email']; ?>"></td>
        </tr>
        <tr>
            <td>Facebook :</td>
            <td><input type="text" name="fb" value="<?php echo $row['Facebook']; ?>"></td>
        </tr>
         
        <tr> 
        <tr>
            <td>Username :</td>
            <td><input type="text" name="user" size="10" value="<?php echo $row['Username']; ?>"></td>
        </tr>
        <tr>
            <td>Password cũ :</td>
            <td><input type="password" name="pass"  value="<?php echo $row['Password']; ?>"size="10"></td>
        </tr>
        <tr>
            <td>Password new :</td>
            <td><input type="password" name="pass" size="10"></td>
        </tr>
        <tr>
            <td>Comfirm Password :</td>
            <td><input type="password" name="cfpass" size="10"></td>
        </tr>
        <tr>
            <td style="height: 40px;"><input type="reset" value="Reset"></td>
            <td style="height: 40px;"><button type="submit" name="addcnad">Cập nhật Admin</button></td>
        </tr>
    </table>
</form>
    <?php
 
if(isset($_POST['addcnad'])){
    

          if($_POST['pass']==$_POST['cfpass']){
              echo "Id".$_POST['madmin'];
              $sql_up_class = "update `admin` set Id='".$_POST['madmin']."' , Ten='".$_POST['tadmin']."',Username='".$_POST['user']."', Password='".$_POST['pass']."', Sdt='".$_POST['sdt']."', Email='".$_POST['email']."', Diachi='".$_POST['dc']."', Facebook='".$_POST['fb']."' where Id='1'";
                mysqli_query($conn, $sql_up_class);
         ?>
                <script>alert("Cập nhật admin thành công");</script>
                    <?php
          }  else {
                ?>
                <script>alert("confirm passwork không hợp lệ");</script>
                    <?php
          }
   
   
}
?>
        
    </div>

                     </div>

                </body>
        </html>


