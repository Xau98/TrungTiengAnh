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
                    <h2>Liên Hệ </h2>
                    <hr>
                    <br>

                    <p><strong>Học viện Kỹ thuật Mật mã</strong><br />
                        Add: 141 đường Chiến Thắng, Tân Triều, Thanh Trì, Hà Nội<br />
                        Tel: 04.38544244<br />
                        Email: contact@actvn.edu.vn<br />
                        Website: www.actvn.edu.vn</p>

                    <p>Hoặc gửi thông tin cho chúng tôi theo mẫu dưới đây:</p>

                    <p>&nbsp;</p>
                    <div>
                        <form method="Post" action="">
                            <table id="tb_lienhe">
                                <tr>
                                    <td><input type="text" name="hoTen" placeholder="Họ và Tên"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="email" placeholder="Email"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="tieuDe" placeholder="Tiêu đề"></td>
                                </tr>
                                <tr>
                                    <td><textarea id="textarea" name="noiDung"placeholder="Nội dung" ></textarea></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="gui" value="Gửi Liên hệ"></td>
                                </tr>
                            </table>
                        </form>
                        <?php
                        if (isset($_POST['gui'])) {
                            if (empty($_POST['hoTen']) || empty($_POST['email']) || empty($_POST['tieuDe'])) {
                                ?>
                                <script language="javascript">
                                    alert('Vui lòng nhập đầy đủ thông tin');
                                </script>
                                <?php
                            } else {

                                $sql_up = "INSERT INTO `lienhe`(`Hoten`, `Email`, `Tieude`, `Noidung`  ) VALUES ('" . $_POST['hoTen'] . "','" . $_POST['email'] . "','" . $_POST['tieuDe'] . "','" . $_POST['noiDung'] . "' )";
                                mysqli_query($conn, $sql_up);
                                   ?>
                                <script language="javascript">
                                    alert('Cảm ơn bạn đã góp ý . Chúng tôi sẽ liên hệ với bạn sớm nhất >>>');
                                </script>
                                <?php
                            }
                        }
                        ?>
                    </div>	 



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
