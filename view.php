<!-- 新闻详细信息页面 -->
<?php
    include("config.php");
    $id = $_GET['m'];
    $sql = "select * from news where id='$id'";
    function hits($connect,$sql){
        $sth = mysqli_query($connect,$sql);
        $result = mysqli_fetch_all($sth,MYSQLI_ASSOC);
        return $result;
    }
    $result = hits($connect,$sql);
    $hits = $result[0]["hits"]+1;
    $hits_add_sql = "update news set hits = '$hits' where id='$id'";
    $sth = mysqli_query($connect,$hits_add_sql);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>China-news</title>
    <link rel="stylesheet" href="../news/css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-olOxEXxDwd20BlATUibkEnjPN3sVq2YWmYOnsMYutq7X8YcUdD6y/1I+f+ZOq/47" crossorigin="anonymous">
    <link rel="stylesheet" href="../news/css/view-css.css">
    <script src="../news/js/jquery-1.12.4.min.js"></script>
</head>
<body>
<div class="status">
        <ul class="nav-status">
            <li><a href="index.php">官方首页</a></li>
            <li><a href="">服务支持</a></li>
            <li class="main-help">帮助
                <ul class="help">
                    <li><a href="">帮助中心</a></li>
                    <li><a href="">关于China-news</a></li>
                </ul>   
            </li>
            <li><a href="">技术论坛</a></li>
            <li><a href="">登录</a></li>
        </ul>
        
    </div>
    <nav>
        <ul>
            <li><a href="index.php">首页</a></li>
            <li><a href="">时事新闻</a></li>
            <li><a href="">财经新闻</a></li>
            <li><a href="">体育新闻</a></li>
            <li><a href="">军事新闻</a></li>
            <li><a href="login.php">后台管理</a></li>
        </ul>
    </nav>
    <div class="body">
        <?php 
            foreach($result as $key=>$news){
        ?>
        <div class="title"><h1><?php echo $news['title']; ?></h1></div>
        <div class="content">
            <div class="sundry">
                <p><?php echo "时间:".$news['settime']?></p>
                <p><?php echo "新闻类别:<a>".$news['newclass']."</a>"; ?></p>
                <p><?php echo "发布人:<a>".$news['adduser']."</a>"; ?></p>
                <p><?php echo "点击量:".$hits?></p>
            </div>
            <div class="text">
                <?php echo $news['content']?>
            </div>
        <?php 
            }
        ?>
    </div>
    <script src="../news/js/index-js.js"></script>
</body>
</html>