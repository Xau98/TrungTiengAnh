 <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//$a = $_GET['Id'];
//echo'kq : ' . $a;
$conn = mysqli_connect('localhost', 'root', '', 'trungtam')or die("can't connect database");
mysqli_set_charset($conn, "utf8");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trung tâm dạy Tiếng Anh </title>
        <link href="../Css/web.css" rel="stylesheet" type="text/css"/> 
    </head>
    <body>
        <div  id="body">
            <!--Start Banner -->
            <div id="banner">
                <?php
                $sql_ch = "SELECT * FROM cauhinh ";
                $result_ch = mysqli_query($conn, $sql_ch);
                $row_ch = mysqli_fetch_assoc($result_ch);
                ?>
                <img src=<?php echo $row_ch['Banner']; ?> width="1000" height="250px;">
            </div>
            <!---End Banner -->
            <!--Start body -->
            <div id="body_body" >
                <!--Start right -->
                <div id="body_left">
                    <div style="height: 35px; background: #66ffff; font-size: 25px; margin: 3px; font-weight: bold;" >Danh mục chính</div>
                    <div  id="menu">
                        <ul>
                            <li><a href="Gioithieu.php">Giới thiệu</a></li>
                            <li><a href="index.php">Trang Chủ</a></li>
                            <li><a href="Tuyensinh.php">Lịch khai giảng</a></li>
                            <li><a href="Daotao.php">Phương pháp đào tạo</a></li>
                            <li id="ul"><a>Đăng nhập</a>
                                <ul >
                                    <li><a href="#">Dành cho giáo viên</a></li>
                                    <li><a href="#">Dành cho học viên</a></li>
                                    <li><a href="#">Dành cho Phụ huynh</a></li>
                                </ul> 
                            </li>
                            <li><a href="Lienhe.php">Liên hệ</a></li>
                        </ul>
                    </div> 
                </div>
                <!--end right -->
                <!--Start content -->
                <div id="content">
                    <div style="background: #ffffff; ">
                        <marquee>
                            Thông báo : Ngày 31/6/ 2019 Nộp bài tập lớn Môn Lập trình web (bao gồm code và phần bản báo ) 
                        </marquee>
                    </div>
                    <h2>Lịch khai Giảng </h2>
                    <?php
                    $sql_bv = "SELECT * FROM baiviet where Vitri='tuyensinh' ";
                    $result_bv = mysqli_query($conn, $sql_bv); 
                    while($row_bv = mysqli_fetch_assoc($result_bv)){
                    ?>
                    <p style="margin-top: 5px; margin-bottom: 10px; "><strong><?php  echo $row_bv['Tenbv'];?></strong> </p>
                    
                    <p> <?php  echo $row_bv['Noidung'];?>  </p>
                    <hr >
                    
                    <?php
                    }
                    ?>
                </div>
                <!--end content -->  
            </div>
            <!--end body -->
            <!--Start end -->
            <div id="end"style="padding-top: 10px;">
                <p><strong>Cơ quan chủ quan :Trung tâm tiếng Anh </strong></p>
                <p><strong>Địa chỉ :</strong> 700 Quang Trung, Hà Đông, Hà Nội </p>
                <p><strong>Email :</strong> <?php echo $row_ch['Email']; ?></p>
                <p><strong>Số điện thoại :</strong> <?php echo $row_ch['Sdt']; ?></p>
            </div>
            <!---End -->
        </div>
    </body>
</html>
