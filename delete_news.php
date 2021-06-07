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
    <link rel="stylesheet" href="../news/css/delete-css.css">
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
    <div class="deletebox">
        <form action="" method="Get">
        <?php 
            foreach ($result as $key=>$news) {
                ?>
                    <div class="delete-box"><div><input type="checkbox" name='delete[]' value="<?php echo $news['id'] ?>"><a href="view.php?m=<?php echo $news['id']?>"><?php echo '标题:'.$news['title']; ?></a></div>
                    <a href="delete_news.php?del=<?php echo $news['id']?>"><input class='deletebtn' type="button" value="删除"></a></div>
                    <br/>
        <?php
             }
        ?>
                <input type="submit" value="批量删除" name='deletesum'>
                </form>  
    </div>
    <?php
    if(isset($_GET["del"])) {
        $id = $_GET['del'];
        echo "<script>
            if(confirm('确定要删除么')){
                window.location.href='deletenews.php?del=".$id."'
            }
            else{
                window.location.href ='delete_news.php'
            }
            </script>";
        
    }
    else if(isset($_GET['deletesum'])){
        // $delete=$_GET['delete'];
        // $str = implode("','",$delete);
        $str = $_SERVER["QUERY_STRING"];
        $str2 = str_replace("&deletesum=%E6%89%B9%E9%87%8F%E5%88%A0%E9%99%A4","",$str);
        echo "<script>
            if(confirm('确定要删除么')){
                window.location.href='delall.php?".$str2."'
            }
            else{
                window.location.href ='delete_news.php'
            }
            </script>";
        
    }
        
    ?>
</body>
</html>