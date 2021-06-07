<?php
    if(strpos($_SERVER['HTTP_REFERER'],'register.php')==true){
        echo "<script>alert('注册成功')</script>";
    }
    $numlist = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    $num ='';
    $numlen=5;
    function createnum($numlist,$num,$numlen){
        for($i=0;$i<$numlen;$i++){
            $numrandom = rand(0,count($numlist)-1);
            $num=$num.$numlist[$numrandom];
        }
        return $num;
    }
    $num =createnum($numlist,$num,$numlen);
?>
<!-- 后台登陆页面 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>China-news-admin</title>
    <link rel="stylesheet" href="../news/css/index.css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../news/css/login-css.css">
</head>
<body>

    <div class='login'>
        <h2>管理员登录</h2>
        <form action="" method="post" class='login-form'>
            用户名:<input type="text" name="userName" id="userName"><br>
            密&nbsp;&nbsp;码: <input type="password" name="pwd" id="pwd"><br>
            验证码:<input type="text" name='num' class='num'><br>
            验证码:<input type='text' name='right-num' class='right-num' value='<?php echo $num; ?>'></input>
            <br>
            <input type="submit" value="登录" name="sublime" id="login"><a href="register.php"><input type="button" value="注册" class="register"></a>
        </form>
    </div>
    <?php
        if(!isset($_COOKIE['id'])){
            if(isset($_POST['sublime'])){
                include("config.php");
                $userName = $_POST["userName"];
                $pwd = $_POST["pwd"];
                $inputnum=strtolower($_POST['num']);
                $num = strtolower($_POST['right-num']);
                if($inputnum==null){
                    echo '<script>alert("验证码不能为空")</script>';
                }
                elseif($inputnum!=$num){
                    echo '<script>alert("验证码错误")</script>';
                }
                elseif($inputnum==$num){
                    if ($userName==null) {
                        echo '<script>alert("用户名不能为空")</script>';
                    } elseif ($pwd==null) {
                        echo '<script>alert("密码不能为空")</script>';
                    } elseif ($userName!=null) {
                        $sql = "select * from admin where username='$userName'";
                        $sth = mysqli_query($connect, $sql);
                        $result = mysqli_fetch_all($sth, MYSQLI_ASSOC);
                        if ($pwd == $result[0]["userpwd"]) {
                            $time = time()+24*60*60;
                            setcookie('id',$result[0]['id'],$time);
                            setcookie('username',$result[0]['username'],$time);
                            setcookie('isLogin',1,$time);
                            Header("Location:admin_index.php");
                        } else {
                            echo '<script>alert("密码错误")</script>';
                        }
                    }
                }     
            }
        }else{
            Header("Location:admin_index.php");
        }
    ?>
</body>
</html>