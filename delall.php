<!-- <?php
    #if(strpos($_SERVER['HTTP_REFERER'],'login.php')===false){
        #header('Location: notfind.php');
    #}
    ?> -->
<!-- 批量删除新闻页面 -->

    <?php
        include("config.php");
        $delete=$_GET['delete'];
        $str = implode("','",$delete);
        $sqlt = "delete from news where id in ('$str');";
        $stht = mysqli_query($connect,$sqlt);
        mysqli_close($connect);
        header("Location: delete_news.php");
    ?>