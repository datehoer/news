<?php 
    include("config.php");
    $sql = "select * from news order by id desc";
    $sth = mysqli_query($connect,$sql);
    $result = mysqli_fetch_all($sth,MYSQLI_ASSOC);
?>

<!-- <?php
    #if(strpos($_SERVER['HTTP_REFERER'],'login.php')===false){
        #header('Location: notfind.php');
    #}
    ?> -->
<!-- 删除新闻页面 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>China-news-admin</title>
    <link rel="stylesheet" href="../news/css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-olOxEXxDwd20BlATUibkEnjPN3sVq2YWmYOnsMYutq7X8YcUdD6y/1I+f+ZOq/47" crossorigin="anonymous">
    <link rel="stylesheet" href="../news/css/admin-css.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">主页</a></li>
            <li><a href="admin_news_add.php">添加新闻</a></li>
            <li><a href="delete_news.php">删除新闻</a></li>
            <li><a href="admin_news_list.php">新闻列表</a></li>
            <li><a href="admin_index.php">后台管理</a></li>
        </ul>
    </nav>
    <div>
        <form action="" method="Get">
        <?php 
            foreach ($result as $key=>$news) {
                ?>
                    <input type="checkbox" name='delete[]' value="<?php echo $news['id'] ?>"><a href="view.php?m=<?php echo $news['id']?>"><?php echo '标题:'.$news['title']; ?></a>
                    <a href="delete_news.php?del=<?php echo $news['id']?>"><input type="button" value="删除"></a>
                    <br/>
        <?php
             }
        ?>
                <input type="submit" value="批量删除" name='deletesum'>
                </form>  
    </div>
    <?php
    if(isset($_GET["del"])) {
        include("config.php");
        $id = $_GET['del'];
        echo $id;
        function del($sql,$connect){
            $sth = mysqli_query($connect,$sql);
        };
        $sql="delete from news where id = '$id'";
        del($sql,$connect);
        mysqli_close($connect);
        header("Location: delete_news.php");
    }
    else if(isset($_GET['deletesum'])){
        include("config.php");
        $delete=$_GET['delete'];
        $str = implode("','",$delete);
        $sqlt = "delete from news where id in ('$str');";
        $stht = mysqli_query($connect,$sqlt);
        mysqli_close($connect);
    }
        
    ?>
</body>
</html>