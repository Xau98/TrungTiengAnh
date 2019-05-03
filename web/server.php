<?php

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $who=$_POST['who'];
    if (empty($user) || empty($pass)) {
        ?>
        <script language="javascript">
            alert('Vui lòng nhập đầy đủ thông tin');
        </script>
        <?php

    } else {  
$conn = mysqli_connect('localhost', 'root', '', 'trungtam')or die("Kết nối thất bại");
mysqli_set_charset($conn, "utf8");
$sql = "SELECT Magv FROM giaovien where Usernamegv='".$user."' and Passwordgv='".$pass."' ";
$result = mysqli_query($conn, $sql);
 $row_login=  mysqli_fetch_assoc($result); 
          
if (empty($row_login['Magv'])) {
    
    ?>
    <script language="javascript" >
        alert("Tài khoản không hợp lệ");
    </script>
    <?php
header("Location: login.php");
}
 else {
    
header("Location: Giaovien.php?Id=".$row_login['Magv']."");
     
 }
mysqli_close($conn); 
}
}

?>
