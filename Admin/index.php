<!DOCTYPE html >
<?php
?>
<html >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Login Admin</title>
        <link href="Css/login.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <fieldset style="width: 250px; height: 200px;margin: 0 auto;" id="login">
                    <legend>Login </legend>
        <form method="post">
            <table    >
                 
                <tr cellspacing="10" style=" height: 30px; width: 50%;" >
                    <td>Username </td>
                    <td><input type="text" name="user" size="20" ></td>
                </tr>
                <tr cellspacing="10" >
                    <td style="">Passwork </td>
                    <td><input type="password" name="pass" size="20" ></td>
                </tr>
                <tr cellspacing="10" >
                    <td><input type="reset" value="Reset"></td>
                    <td><input type="submit" name="login" value="Đăng nhập"></td> 
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST['login'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            if (empty($user) || empty($pass)) {
                ?>
                <script language="javascript">
                    alert('Vui lòng nhập đầy đủ thông tin');
                </script>
                <?php
            } else {
                    include 'server.php';  
                }
            }
        
        ?>
        </fieldset>
    </body>
</html>
