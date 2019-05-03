<!DOCTYPE html>
<?php
//$a = $_GET['Id'];
//echo'kq : ' . $a;
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
                            <a href="Lophoc.php?Id=".<?php echo $row['Id']?>>Thông tin lớp học</a> 
                            <ul>
                                <li> <a href="" >Danh Sách các Khóa</a> </li>
                                <li >   <a href="Lophoc.php?Id=".<?php echo $row['Id']?> >Thông tin cơ bản</a></li>     
                                <li >   <a href="" >Thông tin Chi tiết</a></li>  
                            </ul>
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
                            <a href="Lienhe.php" id="l1" >Cấu hình </a> 
                            <ul>
                                <li> <a href="" >Banner1</a> </li>
                                <li ><a href="" >Thiết lập trang web</a></li>
                            </ul>
                            <a href="Cauhinh.php"></a>
                        </li >  
                        <li id ="li">
                            <a href="">Tài khoản </a> 
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
                        </li>   -->
            <?php
            if (isset($_POST['sub_up_load'])) {
                $file_part = $_FILES['up_load']['name'];
                move_uploaded_file($_FILES['up_load']['tmp_name'], "Img/" . $file_part);
                $sql_up_anh = "update admin set Img='Img/" . $file_part . "' where Id='" . $row['Id'] . "'";
                mysqli_query($conn, $sql_up_anh);
            }
            ?> 

                 <div id="right">
                
                <form method="Post">
                    <div id="title_body">
                        <h2>Thiết lập tài khoản</h2>
                </div>
                    <table id="tb_tk">
                        <tr style="height: 50px;">
                            <td> <strong>Mã </strong> </td>
                            <td><strong>Tên Admin</strong></td>
                            <td><strong>Tên đăng nhập</strong></td>
                            <td><strong>Sdt </strong></td>
                            <td><strong>Email<strong></td>
                            <td><strong>Địa chỉ <strong></td>
                            <td><strong>Facebook<strong></td> 
                            <td><strong>Phân quyền<strong></td> 
                                        

                        <?php
                        $sql1 = "SELECT * FROM admin  ";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            ?>
                            <tr>
                                <td> <?php echo $row1['Id']; ?></td>
                                <td> <?php echo $row1['Ten']; ?></td>
                                <td> <?php echo $row1['Username']; ?></td>
                                <td> <?php echo $row1['Sdt']; ?></td>
                                <td> <?php echo $row1['Email']; ?></td>
                                <td> <?php echo $row1['Diachi']; ?></td>
                                <td> <?php echo $row1['Facebook']; ?></td>
                                <td> <?php echo $row1['Phanquyen']; ?></td>
                            </tr> 
                            
                            <?php
                        }
                        ?>
                            <tr style="height: 40px;"></tr>
                        </table>
                        </form>
                <hr>
                
              <div  style="height: 500px; margin-left: 400px; margin-top: 40px;">
    <form style=" text-align: center;" method="post">
    <table style="width: 400px; height:400px;background: #66ff66;  border: 2px #000000 solid;">
        <tr  >
            <td colspan="2"><strong>Form thêm Admin</strong> </td>
        </tr>
         <tr>
            <td>Mã Admin:</td>
            <td><input type="text" name="madmin"></td>
        </tr>
        <tr>
            <td>Tên Admin :</td>
            <td><input type="text" name="tadmin""></td>
        </tr> 
        <tr>
            <td>Địa chỉ :</td>
            <td><input type="text" name="dc"></td>
        </tr>
        <tr>
            <td>Số điện thoại :</td>
            <td><input type="number" name="sdt"></td>
        </tr>
        <tr>
            <td>Email :</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td>Facebook :</td>
            <td><input type="text" name="fb"></td>
        </tr>
         
        <tr>
        <tr>
            <td>Chọn quyền :</td>
           <td>
               <input type="radio" name="cquyen1" value="Xem">Xem</br>
               <input type="radio" name="cquyen2" value="Sua">Sửa</br>
               <input type="radio" name="cquyen3" value="Xoa">Xóa</br>
        </tr>
        <tr>
            <td>Username :</td>
            <td><input type="text" name="user" size="10"></td>
        </tr>
        <tr>
            <td>Password :</td>
            <td><input type="password" name="pass" size="10"></td>
        </tr>
        <tr>
            <td>Comfirm Password :</td>
            <td><input type="password" name="cfpass" size="10"></td>
        </tr>
        <tr>
            <td style="height: 40px;"><input type="reset" value="Reset"></td>
            <td style="height: 40px;"><button type="submit" name="addad">Thêm Admin</button></td>
        </tr>
    </table>
</form>
    <?php
 
if(isset($_POST['addad'])){
    
    if(!empty($_POST['madmin"'])||!empty($_POST['tadmin"'])||!empty($_POST['dc'])||!empty($_POST['sdt'])||!empty($_POST['email'])||!empty($_POST['user'])||!empty($_POST['pass'])||!empty($_POST['cfpass'])){
          if($_POST['pass']==$_POST['cfpass']){
              $sql_up_class = "INSERT INTO `admin`(`Id`, `Ten`, `Username`, `Password`, `Sdt`, `Email`, `Diachi`, `Facebook`, `Phanquyen`) VALUES ('".$_POST['madmin']."','".$_POST['tadmin']."','".$_POST['user']."','".$_POST['pass']."','".$_POST['sdt']."','".$_POST['email']."','".$_POST['dc']."','".$_POST['fb']."','".$_POST['cquyen1'].$_POST['cquyen2'].$_POST['cquyen3']."' )";
                mysqli_query($conn, $sql_up_class);
         ?>
                <script>alert("add admin");</script>
                    <?php
          }  else {
                ?>
                <script>alert("confirm passwork không hợp lệ");</script>
                    <?php
          }
   
    }  else {
        
        ?>
                <script>alert("chuaw add admin");</script>
                    <?php 
    }
}
?>
                            </div>

                        </div>
              </div>
      </body>
  </html>


