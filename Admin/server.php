<?php

$conn = mysqli_connect('localhost', 'root', '', 'trungtam')or die("Kết nối thất bại");
mysqli_set_charset($conn, "utf8");
$sql = "SELECT Id,Username,Password FROM admin";
$result = mysqli_query($conn, $sql);
$dem = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($_POST['user'] == $row['Username'] && $_POST['pass'] == $row['Password']) {
            header("Location: Quantri.php?Id=".$row['Id']."");
            ?>
            <script language="javascript">
                alert('Đăng nhập thành công');
            </script>
            <?php

            $dem == 1;
        }
    }
} else {
    echo "0 results";
}  //
if ($dem == 0) {
    ?>
    <script language="javascript" >
        alert("Tài khoản không hợp lệ");
    </script>
    <?php

}
mysqli_close($conn);
?>
