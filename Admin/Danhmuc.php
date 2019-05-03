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
<form method="Post">
                    <div id="title_body">
                        <h2>Danh mục</h2>
                </div>
                    <table id="tb_tk">
                        <tr style="height: 50px; border-bottom: #000000 1px solid;" >
                            <td> <strong>ID</strong> </td>
                            <td><strong>Tên Danh Mục</strong></td>
                            <td><strong>Danh mục cha</strong></td>
                            <td><strong> Link </strong></td>
                            <td><strong>Chức năng <strong></td> 
                                        </tr>
                        <?php
                        $sql1 = "SELECT * FROM danhmuc  ";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            ?>
                            <tr>
                                <td> <?php echo $row1['ID']; ?></td>
                                <td> <?php echo $row1['Tendm']; ?></td>
                                <td> <?php echo $row1['Danhmuccha']; ?></td>
                                <td> <?php echo $row1['Link']; ?></td>
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
                     $sql12 = "SELECT * FROM danhmuc  ";
                        $result12 = mysqli_query($conn, $sql12);
                        while ($row12 = mysqli_fetch_assoc($result12)) {
                            if(isset($_POST['xoa'.$row12['ID']])){ 
                                $sqlxoa="DELETE FROM `danhmuc` WHERE ID='".$row12['ID']."'";
                                mysqli_query($conn, $sqlxoa);
                                 ?>
                               <script>alert("Xoa Danh mục thành công");</script>
                        <?php
                            } 
                            //sửa
                            if (isset($_POST['sua' . $row12['ID']])) {
                                       ?>
                               
                          <div  style="height: 500px; margin-left: 400px; margin-top: 40px;">
            <form style=" text-align: center;" method="post">
            <table style="width: 330px; height:330px;background: #66ff66;  border: 2px #000000 solid;">
                <tr  >
                    <td colspan="2"><strong>Form Sửa Danh mục</strong> </td>
                </tr>
                <tr> 
                    <td>ID Danh Mục :</td>
                    <td ><input type="hidden"  name="IDcn" value=<?php echo $row12['ID']; ?>><?php echo $row12['ID']; ?> </td>
                </tr>
                <tr>
                    <td>Tên Danh mục :</td>
                    <td><input type="text" name="tdmcn" value=<?php echo $row12['Tendm']; ?>></td>
                </tr> 
                <tr>
                    <td>Chọn danh mục cha:</td>
                    <td>
                        <select name="dmchacn" > 
                        <?php
                        $sql21 = "SELECT * FROM danhmuc  ";
                        $result21 = mysqli_query($conn, $sql21);
                        while ($row21 = mysqli_fetch_assoc($result21)) {
                            ?>
                                <option value="<?php echo $row21['Danhmuccha']; ?>"><?php echo $row21['Danhmuccha']; ?></option>
                        <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Link :</td>
                    <td><input type="text" name="linkcn" value=<?php echo $row12['Link'] ?>></td>
                </tr>
               
                <tr> 
                    <td></td>
                    <td style="height: 40px;"><button type="submit" name="cn">Cập nhật</button></td>
                </tr>
            </table>
            </form>
                          </div> 
                              <?php
                              }
                          }
                          if (isset($_POST['cn'])) {
                              if (!empty($_POST['tdmcn']) || !empty($_POST['linkcn'])) {
                                  echo 'hyhy'.$_POST['IDcn'];

                                  $sql_up_cn = "UPDATE `danhmuc` SET  `Tendm`='" . $_POST['tdmcn'] . "',`Danhmuccha`='" . $_POST['dmchacn'] . "',`Link`='" . $_POST['linkcn'] . "' WHERE ID='". $_POST['IDcn'] ."'";
                                  mysqli_query($conn, $sql_up_cn);
                                  ?>
                                  <script>alert("Cập nhật thành công");</script>
                                  <?php
                              } else {
                                  ?>
                                  <script>alert("Nhập đầy đủ thông tin ");</script>
                                  <?php
                              }
                          }



                          //Thêm 
                    ?>
                                  <form method="post">
                                      <input type="button" id="submitadd"  value="Thêm Danh mục" >
                                  </form>                         
                <hr>
                <script language="javascript"> 
                                   document.getElementById('submitadd').onclick = function () {
                document.getElementById("them").style.display = 'none';
            };
                               </script>
              <div id="them" style="height: 500px; margin-left: 400px; margin-top: 40px;">
    <form style=" text-align: center;" method="post">
    <table style="width: 330px; height:330px;background: #66ff66;  border: 2px #000000 solid;">
        <tr  >
            <td colspan="2"><strong>Form Thêm Danh mục</strong> </td>
        </tr>
        <tr>
            <td>Tên Danh mục :</td>
            <td><input type="text" name="tdm"></td>
        </tr> 
        <tr>
            <td>Chọn danh mục cha:</td>
            <td>
                <select name="dmcha" >
                    <option value="">Tạo danh mục cha</option>
                  <?php
                   $sql2 = "SELECT * FROM danhmuc  ";
                        $result2 = mysqli_query($conn, $sql2);
                  while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                    <option value="<?php echo $row2['Danhmuccha']; ?>"><?php echo $row2['Danhmuccha']; ?></option>
                  <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Link :</td>
            <td><input type="text" name="link"></td>
        </tr>
       
        <tr>
            <td style="height: 40px;"><input type="reset" value="Reset"></td>
            <td style="height: 40px;"><button type="submit" name="addm">Thêm Danh mục</button></td>
        </tr>
    </table>
</form>
    <?php 
    //Add
if(isset($_POST['addm'])){
    //?? cho chạy lại , nó tiếp tục thêm thàng khác
    if(!empty($_POST['tdm'])||!empty($_POST['link'])){
           if($_POST['dmcha']==''){
                $sql_up = "INSERT INTO `danhmuc`( Tendm, `Danhmuccha`, `Link`) VALUES ('".$_POST['dmcha']."' ,'".$_POST['tdm']."','".$_POST['link']."')";
                mysqli_query($conn, $sql_up);
           }else{ 
              $sql_up = "INSERT INTO `danhmuc`( Tendm, `Danhmuccha`, `Link`) VALUES ('".$_POST['tdm']."','".$_POST['dmcha']."' ,'".$_POST['link']."')";
                mysqli_query($conn, $sql_up);
         ?>
                <script>alert("Thêm Danh mục thành công");</script>
                    <?php
    }
   
    }  else {
        
        ?>
                <script>alert("Nhập đầy đủ thông tin ");</script>
                    <?php 
    }
}
?>
                            </div>

                        </div>
                     </div>

                </body>
        </html>


