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
                        <h2>Hiện thị thông tin chi tiết lớp học</h2>
                </div>
                    <table id="tb_tk">
                        <tr style="height: 50px;">
                            <td> <strong>Nhập vào :</strong> </td> 
                            <td><input type="text" name="nhap" placeholder="Mã lớp hoặc tên lớp "></td>
                            <td><input type="submit" name="timkiem" value="Tìm kiếm"></td>
                        </tr>
                    </table>
                </form>
                        <?php
                        if(isset($_POST['nhap'])){
                        $sql1 = "SELECT * FROM (lophoc join giaovien on giaovien.Malop=lophoc.Malop) where lophoc.Malop='".$_POST['nhap']."' or Tenlop='".$_POST['nhap']."'";
                        $result1 = mysqli_query($conn, $sql1);
                       $rowkq=  mysqli_fetch_assoc($result1)
                            ?>    
                <table style="width: 100%; height: 100px;"> 
                    <tr>
                        <td><strong>Tên lớp : </strong> <?php echo $rowkq['Tenlop'];?></td>
                        <td><strong>Sỹ số học viên :<strong> <?php echo $rowkq['Siso'];?></td>
                        <td> <strong>Địa điểm học : </strong><?php echo $rowkq['Diadiem'];?></td>
                    </tr>
                    <tr>
                        <td> <strong>Mã GVCN : </strong><?php echo $rowkq['Magv'];?></td>
                        <td><strong>Tên GVCN : </strong><?php echo $rowkq['Tengv'];?></td>
                        <td><strong> SDT GVCN :</strong> <?php echo $rowkq['Sdt'];?></td>
                    </tr>
                            <tr style="height: 40px;"></tr>
                        </table> 
                <hr>
                
              <div >
   
    <table style="width: 100%; height: 100px;" >
        <tr  >
            <td colspan="2"><h2>Danh sách học viên của lớp : <?php echo $rowkq['Tenlop'] ; ?></h2> </td>
        </tr>
         <tr>
             <td><strong>Mã HV :</strong></td>
             <td><strong>Tên HV :</strong></td>
             <td><strong>Ngày Sinh :</strong></td>
             <td><strong>SDT :</strong></td>
             <td><strong>Email :</strong></td>
        </tr>
        <?php
                        $sqlkq2 = "SELECT * FROM (lophoc join hocvien on hocvien.Malop=lophoc.Malop) where lophoc.Malop='".$_POST['nhap']."' or Tenlop='".$_POST['nhap']."'";
                        $resultkq2 = mysqli_query($conn, $sqlkq2); 
                       while ($rowkq2 = mysqli_fetch_assoc($resultkq2)) { 
                            ?> 
                          <tr>
                                <td> <?php echo $rowkq2['Mahv']; ?></td>
                                <td> <?php echo $rowkq2['Tenhv']; ?></td>
                                <td> <?php echo $rowkq2['Ngaysinh']; ?></td> 
                                <td> <?php echo $rowkq2['Sdt']; ?></td>
                                <td> <?php echo $rowkq2['Email']; ?></td>
                            </tr> 
                       <?php
                       }
                        }
                       ?>
        
    </table>
 
              </div>
            </div>

        </div>

                </body>
        </html>


