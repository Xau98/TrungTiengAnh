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
                            <a href="Lophoc.php?Id=".<?php echo $row['Id'] ?>>Thông tin lớp học</a> 
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
                            <a>Cấu hình </a> 
                            <ul>
                                <li> <a href="" >Banner</a> </li><br>
                                <li >   <a href="Cauhinh.php" >Thiết lập trang web</a>   </li>
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
                <form method="Post" style=" text-align: center;padding-left: 20px;">
                    <div>
                        <h3>Danh sách Các ảnh trong web</h3>
                </div>
                    <table id="tb_tk" cellspacing="5" cellpadding="5" style="width:100%; border: 1px #000000 solid;">
                        <tr   >
                            <td  > <strong>Mã Ảnh</strong> </td>
                            <td  ><strong>Img</strong></td>
                            <td  ><strong>Alter </strong></td>
                            <td  ><strong>Vị trí <strong></td> 
                           <td ><strong>Chức năng</strong> </td>
                        <?php
                        $sql1 = "SELECT * FROM img  ";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            ?>
                            <tr>
                                <td style="height: 40px;"> <?php echo $row1['ID']; ?></td>
                                <td> <?php echo $row1['Img']; ?></td>
                                <td> <?php echo $row1['Alt']; ?></td>
                                <td> <?php echo $row1['Vitri']; ?></td> 
                                <td>
                                    <input type="submit" name="sua<?php echo $row1['ID']; ?>" id="suaform" value="Sửa">
                                    <input type="submit" name="xoa<?php echo $row1['ID']; ?>" id="suaform" value="Xóa">
                                    </td>
                            </tr> 
                            
                            <?php
                        }
                        ?>
                            <tr style="height: 40px;"></tr>
                        </table>
                        </form>
                <?php
                if(isset($_POST['suaBn2'])){
                    echo "BN2";
                }
                ?>
                <hr>
                
                
                <form  method="post" style=" text-align: center;padding-left: 300px;" enctype="multipart/form-data">
                    <div id="close">X</div>
                    <table style="width: 400px; height:300px;background: #66ff66;  border: 2px #000000 solid;">
                        <tr>
                            <td colspan="2"><strong>Form Add ảnh</strong> </td>
                        
                        </tr>
                        <tr>
                            <td>Chọn ảnh:</td>
                            <td><input type="file" name="file"></td>
                        </tr> 
                        <tr>
                            <td>Chọn nơi hiện thị :</td>
                            <td>
                                <select name ="vitri" >
                                    <option   value="Bannerdau"> Banner đầu trang web  </option>
                                    <option   value="Quangcao"> Banner Quảng cáo </option>
                                    
                                </select>
                            </td>
                        </tr> 
                        <tr>
                            <td>Alter :</td>
                            <td><input type="text" name="alt"></td>
                        </tr>

                        <tr>
                            <td style="height: 40px;"><input type="reset" value="Reset"></td>
                            <td style="height: 40px;"><button type="submit" name="addgv">Cập nhật </button></td>
                        </tr>
                    </table>
                </form>
            </div>
             <?php
            if (isset($_POST['addgv'])) {
                $file_part1 = $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], "Img/" . $file_part1);
                echo "huh".$_POST['vitri'];
                $sql_up ="Insert into img values ('BN' ,'Img/Banner/". $file_part1 . "', '".$_POST['alt']."', '".$_POST['vitri']."')"; 
                mysqli_query($conn, $sql_up);
                
            }
            ?> 
            
            <div id="sua">

            </div>
        </div>
    </div>
</body>
</html>


