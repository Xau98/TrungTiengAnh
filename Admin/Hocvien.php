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
                            <a href="">Thông tin học viên</a> 
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
<!-- right -->
            <div id="right">
                
                <form method="Post">
                    <div>
                        <h2>Danh sách chi tiết cho từng Học viên</h2>
                </div>
                    <table id="tb_tk">
                        <tr style="height: 50px;">
                            <td> <strong>Mã HV</strong> </td>
                            <td><strong>Tên Học viên</strong></td>
                            <td><strong>Sdt </strong></td>
                            <td><strong>Tên lớp <strong></td>
                            <td><strong>Ngày sinh <strong></td>
                            <td><strong>Email<strong></td> 
                        <?php
                        $sql1 = "SELECT * FROM hocvien  ";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            ?>
                            <tr>
                                <td> <?php echo $row1['Mahv']; ?></td>
                                <td> <?php echo $row1['Tenhv']; ?></td>
                                <td> <?php echo $row1['Sdt']; ?></td>
                                <td> <?php echo $row1['Malop']; ?></td>
                                <td> <?php echo $row1['Ngaysinh']; ?></td>
                                <td> <?php echo $row1['Email']; ?></td>
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
            <td colspan="2"><strong>Form thêm Học viên</strong> </td>
        </tr>
         <tr>
            <td>Mã HV:</td>
            <td><input type="text" name="mhv"></td>
        </tr>
        <tr>
            <td>Tên Học viên :</td>
            <td><input type="text" name="thv"></td>
        </tr>
        <tr>
            <td>Chọn lớp học :</td>
           <td><select name="clop" style="height: 30px; width: 200px;">
                    <?php
                    $sql3 = "SELECT * FROM dslop ";
                    $result3 = mysqli_query($conn, $sql3); 
                    while( $row3 = mysqli_fetch_assoc($result3)){
                        ?>
                    <option>
                        <?php
                            echo $row3['Tenlop'];
                        ?>
                    </option>
                        <?php
                    }
                    
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Ngày Sinh :</td>
            <td><input type="date" name="ns"></td>
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
            <td style="height: 40px;"><input type="reset" value="Reset"></td>
            <td style="height: 40px;"><button type="submit" name="addhv">Thêm Học Viên</button></td>
        </tr>
    </table>
</form>
    <?php
 
if(isset($_POST['addhv'])){
    
    if(!empty($_POST['mhv'])||!empty($_POST['thv'])||!empty($_POST['ns'])||!empty($_POST['sdt'])||!empty($_POST['clop'])){
          
   $sql_up_class = "INSERT INTO `hocvien`(`Mahv`, `Tenhv`, `Malop`, `Ngaysinh`, `Sdt`,'Email' ) VALUES ('".$_POST['mhv']."','".$_POST['thv']."',".$_POST['clop'].",'".$_POST['ns']."','".$_POST['sdt']."','".$_POST['email']."' )";
                mysqli_query($conn, $sql_up_class);
         ?>
                <script>alert("add hv");</script>
                    <?php
    }  else {
        
        ?>
                <script>alert("chuaw add hv");</script>
                    <?php 
    }
}
?>
</div>
                        </div>

                     </div>

                </body>
        </html>


