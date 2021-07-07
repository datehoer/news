<?php
    $update_id = $_GET["id"];
    include("config.php");
    $sql = "select * from admin where id = '$update_id'";
    $sth = mysqli_query($connect,$sql);
    $result = mysqli_fetch_all($sth,MYSQLI_ASSOC);
?>
<!-- 后台注册页面 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>China-news-admin</title>
    <link rel="stylesheet" href="../news/css/index.css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../news/css/register-css.css">
</head>
<body>

    <div class='register'>
        <h2>用户信息修改</h2>
        <form action="" method="post" class='register-form'>
            <span>用户名:</span><input type="text" name="userName" id="userName" class='inputtext' value='<?php echo $result[0]["username"]?>'><br>
            <span>密码:</span><input type="text" name="pwd" id="pwd" class='inputtext' value='<?php echo $result[0]["userpwd"]?>'><br>
            <span>邮箱:</span><input type="email" class='inputtext' name="email" value='<?php echo $result[0]["email"]?>'><br>
            <!-- 邮箱验证码:<input type="text" ><br> -->
            <br>
            <input type="submit" value="修改" class="register-btn" name='submit'></a>
        </form>
    </div>

    <?php
        if(isset($_POST['submit'])){
            include('config.php');
            $username = $_POST['userName'];
            $pwd = $_POST['pwd'];
            $email = $_POST['email'];
            $sql = "select * from admin where username='$username'";
            $sth = mysqli_query($connect,$sql);
            $result = mysqli_fetch_all($sth);
            if($username ==null||$pwd==null||$email==null){
                echo '<script>alert("用户名/密码/邮箱不能为空")</script>';
            }
            else{
                $sqlt ="update admin set username='$username',userpwd='$pwd',email='$email' where id ='$update_id'";
                $stht = mysqli_query($connect,$sqlt);
                mysqli_close($connect);
                header("Location: admin_admin.php");
            }
        }
    ?>
</body>
</html>