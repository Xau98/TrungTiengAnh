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
                            <a href="">Thông tin lớp học</a> 
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
                            <a href="Quantri.php?Id=".<?php echo $row['Id'];?>>Tài khoản </a> 
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
                        <h2>Danh sách cho từng lớp học</h2>
                </div>
                    <table id="tb_tk">
                        <tr style="height: 50px;">
                            <td> <strong>Mã Lớp</strong> </td>
                            <td><strong>Tên lớp</strong></td>
                            <td><strong>Sỹ số</strong></td>
                            <td><strong>Giáo viên chủ nhiệm<strong></td>
                            <td><strong>Sdt GV<strong></td>
                            <td><strong>Địa điểm<strong></td> 
                        <?php
                        $sql1 = "SELECT * FROM (lophoc join giaovien on giaovien.Malop=lophoc.Malop)  ";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            ?>
                            <tr>
                                <td> <?php echo $row1['Malop']; ?></td>
                                <td> <?php echo $row1['Tenlop']; ?></td>
                                <td> <?php echo $row1['Siso']; ?></td>
                                <td> <?php echo $row1['Tengv']; ?></td>
                                <td> <?php echo $row1['Sdt']; ?></td>
                                <td> <?php echo $row1['Diadiem']; ?></td>
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
            <td colspan="2"><strong>Form thêm lớp học</strong> </td>
        </tr>
         <tr>
            <td>Mã lớp học :</td>
            <td><input type="text" name="mlop"></td>
        </tr>
        <tr>
            <td>Tên lớp học :</td>
            <td><input type="text" name="tlop"></td>
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
                            echo $row3['Tenkhoa'];
                        ?>
                    </option>
                        <?php
                    }
                    
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Si số :</td>
            <td><input type="number" name="siso"></td>
        </tr>
        <tr>
            <td>Đia điểm :</td>
            <td><input type="text" name="diadiem"></td>
        </tr>
        <tr>
            <td>Giáo viên :</td>
            <td><select name="choosegv" style="height: 30px; width: 200px;">
                    <?php
                    $sql2 = "SELECT * FROM giaovien ";
                    $result2 = mysqli_query($conn, $sql2); 
                    while( $row2 = mysqli_fetch_assoc($result2)){
                        ?>
                    <option>
                        <?php
                            echo $row2['Tengv'];
                        ?>
                    </option>
                        <?php
                    }
                    
                    ?>
                </select></td>
        </tr>
        <tr>
            <td style="height: 40px;"><input type="reset" value="Reset"></td>
            <td style="height: 40px;"><button type="submit" name="add">Thêm lớp học</button></td>
        </tr>
    </table>
</form>
    <?php
 
if(isset($_POST['add'])){
    
    if(!empty($_POST['mlop'])||!empty($_POST['tlop'])||!empty($_POST['siso'])||!empty($_POST['diadiem'])){
         
   $sql_up_class = "INSERT INTO `lophoc`(`Malop`, `Tenlop`, `Siso`, `Magv`, `Tenkhoi`, `Diadiem`) VALUES ('".$_POST['mlop']."','".$_POST['tlop']."',".$_POST['siso'].",'".$_POST['choosegv']."','".$_POST['clop']."','".$_POST['diadiem']."')";
                mysqli_query($conn, $sql_up_class);
         ?>
                <script>alert("add lop");</script>
                    <?php
    }  else {
        
        ?>
                <script>alert("chuaw add lop");</script>
                    <?php 
    }
}
?>
</div>
                        </div>

                     </div>

                </body>
        </html>


