<!-- 退出登录 -->
<?php
    if(isset($_GET['go'])){
        setcookie('id','',time()-3600);
        setcookie('username','',time()-3600);
        setcookie('isLogin','',time()-3600);
        header("Location:index.php");
    }
    
?>
