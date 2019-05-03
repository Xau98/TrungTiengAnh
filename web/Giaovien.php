<!DOCTYPE html>
<?php 
$conn = mysqli_connect('localhost', 'root', '', 'trungtam')or die("can't connect database");
mysqli_set_charset($conn, "utf8");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đăng nhập giáo viên</title>
        <link href="css_giaodien.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
       // $a = $_GET['Id'];
       //echo 'Giao vien' . $a;
        ?>
        <div id='frame'>
            <div id ='banner'> <?php
                $sql_ch = "SELECT * FROM cauhinh ";
                $result_ch = mysqli_query($conn, $sql_ch);
                $row_ch = mysqli_fetch_assoc($result_ch);
                ?>
                <img src=<?php echo $row_ch['Banner']; ?> width="1000px" height="300px"></div>
            <div id ='content'>
                <div id='content_left'>
                    <ul id="dm">Danh mục chính</ul>
                   <div id="menu">

                    <ul id ="lu">
                        <li id ="li">
                            <a href="">Thời khóa biểu</a> 
                        </li>
                        <li id ="li">
                            <a href="">Điểm danh học viên</a> 
                        </li>
                        <li id ="li">
                            <a href="">Liên hệ </a> 
                        </li>  
                        <li id ="li">
                            <a href="">Tài khoản </a> 
                        </li> 
                        <li id ="li">
                            <a href="index.php">Đăng xuất</a> 
                        </li>  
                    </ul>  
                </div>
                    
                </div>
                <div id='content_right'>right</div> 
            </div>
            <div id ='end'>foot</div>
        </div>


    </body>
</html>
