<?php 
    include("config.php");
    $sql = "select * from news order by id desc";
    $sth = mysqli_query($connect,$sql);
    $result = mysqli_fetch_all($sth,MYSQLI_ASSOC);
?>
<!-- 系统主页面 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>China-news</title>
    <link rel="stylesheet" href="../news/css/index.css">
    <link rel="stylesheet" href="../news/css/index-css.css">
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
            <?php
                if(!isset($_COOKIE['id'])){
                    echo '<li><a href="login.php">登录</a></li>';
                }
                else {
                    echo '<li class="index-login">'.$_COOKIE['username'].'<ul class="login">';
                    echo '<li><a href="login.php">后台管理</a></li>';
                    echo '<li><a href="admin-logout.php?go=logout">退出登录</a></li></ul></li>';
                }
            ?>
            
        </ul>
        
    </div>
    <nav>
        <ul>
            <li><a href="">首页</a></li>
            <li><a href="">时事新闻</a></li>
            <li><a href="">财经新闻</a></li>
            <li><a href="">体育新闻</a></li>
            <li><a href="">军事新闻</a></li>
            <li><a href="login.php">后台管理</a></li>
        </ul>
    </nav>
    <div class="thingsbox">
        <div class="banner thingbox">
            <ul class='banner-img'>
                <li>
                    <a href=''>
                        <img src="../news/images/a.jpg" alt="">
                        <p>aaaaaa</p>
                    </a>
                </li>
                <li>
                    <a href=''>
                        <img src="../news/images/b.jpg" alt="">
                        <p>bbbbbb</p>
                    </a>
                </li>
            </ul>
            <div class="banner-radio">
                <img src="../news/images/left.png" alt="" class="banner-radio-left">
                <img src="../news/images/right.png" alt="" class="banner-radio-right">
            </div>
            <ul class="banner-under">
                <li class='under-active'>
                </li>
                <li>

                </li>
            </ul>
        </div>
        <div class="newthing thingbox">
            <h2>最新新闻资讯</h2>
            <div>
                <?php 
                    $num = 0;
                    foreach ($result as $key=>$news) {
                            echo "<a href='view.php?m=".$news['id']."'><span class='index-title'>";
                            echo '标题:'.$news['title'].'</span></a><br/>';
                            $num ++;
                            if($num == 10){
                                break;
                            } 
                    }
                ?>
            </div> 
        </div>
        <div class="timething thingbox">
            <h2>时事新闻</h2>
            <div class="newsbox">
                <div class="more"><a href="">更多&lt;&lt;&lt;</a></div>
                <?php 
                    foreach ($result as $key=>$news) {
                            if($news['newclass']=='时事新闻'){echo "<a href='view.php?m=".$news['id']."'><span class='index-title'>";echo '标题:'.$news['title'].'</span></a><span class="index-time">'.$news['settime'].'</span><br/>';}
                    }
                ?>
            </div>
        </div>
        <div class="moneything thingbox">
            <h2>财经新闻</h2>
            <div class="newsbox">
            <div class="more"><a href="">更多&lt;&lt;&lt;</a></div>
                <?php 
                    foreach ($result as $key=>$news) {
                            if($news['newclass']=='财经新闻'){echo "<a href='view.php?m=".$news['id']."'><span class='index-title'>";echo '标题:'.$news['title'].'</span></a><span class="index-time">'.$news['settime'].'</span><br/>';}
                    }
                ?>
            </div>
        </div>
        <div class="sportthing thingbox">
            <h2>体育新闻</h2>
            <div class="newsbox">
            <div class="more"><a href="">更多&lt;&lt;&lt;</a></div>
                <?php 
                    foreach ($result as $key=>$news) {
                            if($news['newclass']=='体育新闻'){echo "<a href='view.php?m=".$news['id']."'><span class='index-title'>";echo '标题:'.$news['title'].'</span></a><span class="index-time">'.$news['settime'].'</span><br/>';}
                    }
                ?>
            </div>
        </div>
        <div class="fightthing thingbox">
            <h2>军事新闻</h2>
            <div class="newsbox">
            <div class="more"><a href="">更多&lt;&lt;&lt;</a></div>
                <?php 
                    foreach ($result as $key=>$news) {
                            if($news['newclass']=='军事新闻'){echo "<a href='view.php?m=".$news['id']."'><span class='index-title'>";echo '标题:'.$news['title'].'</span></a><span class="index-time">'.$news['settime'].'</span><br/>';}
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class='friend-link'>
            <h2>友情链接</h2>
            <ul>
                <li><a href="">Datehoer'Blog</a></li>
                <li><a href="">Datehoer'Blog</a></li>
                <li><a href="">Datehoer'Blog</a></li>
                <li><a href="">Datehoer'Blog</a></li>
                <li><a href="">Datehoer'Blog</a></li>
            </ul>
        </div>
        <div class="status-footer">
            <ul>
                <li><a href="">关于我们</a></li>
                <li><a href="">关于我们</a></li>
                <li><a href="">关于我们</a></li>
                <li><a href="">关于我们</a></li>
                <li><a href="">关于我们</a></li>
            </ul>
        </div>
    </div>
    <script src="../news/js/index-js.js"></script>
</body>
</html>