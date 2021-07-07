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
            <li><a href="index.php">首页</a></li>
            <li><a href="index_list.php?class=ss">时事新闻</a></li>
            <li><a href="index_list.php?class=cj">财经新闻</a></li>
            <li><a href="index_list.php?class=ty">体育新闻</a></li>
            <li><a href="index_list.php?class=js">军事新闻</a></li>
            <li><a href="login.php">后台管理</a></li>
        </ul>
        <div class='search-box'>
                <form action="search.php" method="Get">
                    <input type="text" name="search" id="search" placeholder="请输入要搜索的新闻">
                    <select name="searchclass" id="">
                        <option value="">请选择搜索的分类</option>
                        <option value="newclass">类型</option>
                        <option value="title">标题</option>
                        <option value="adduser">作者</option>
                        <option value="content">内容</option>
                    </select>
                    <input type="submit" value="搜索" name="searchup">
                </form>
        </div>
    </nav>
    <div class="thingsbox">
        <div class="banner thingbox">
            <ul class='banner-img'>
            <?php
                $sqlbanner = 'select * from banner';
                $sthbanner = mysqli_query($connect,$sqlbanner);
                $resultbanner = mysqli_fetch_all($sthbanner,MYSQLI_ASSOC);
                foreach($resultbanner as $keys => $banner){
                    echo '<li><a href='.$banner['url'].'><img src="'.$banner["pic"].'"><p>'.$banner["title"].'</p></a></li>';
                }
            
            ?>
            </ul>
            <div class="banner-radio">
                <img src="../news/images/left.png" alt="" class="banner-radio-left">
                <img src="../news/images/right.png" alt="" class="banner-radio-right">
            </div>
            <ul class="banner-under">
                
                <?php
                    foreach($resultbanner as $keys => $banner){
                        echo '<li></li>';
                    }
                ?>
                <script>
                    $('.banner-under>li:first-child').addClass('under-active');
                </script>
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
        <?php 
            $sqlclass = 'select * from new_class';
            $sthclass = mysqli_query($connect,$sqlclass);
            $sqlnews = 'select * from news';
            $sthnews = mysqli_query($connect,$sqlnews);
            $resultnews = mysqli_fetch_all($sthnews,MYSQLI_ASSOC);
            $resultclass = mysqli_fetch_all($sthclass,MYSQLI_ASSOC);
            foreach($resultclass as $key => $newclass){
                echo "<div class='thingbox'><h2>".$newclass['newclass']."</h2><div class='newsbox'><div class='more'><a href=''>更多&lt;&lt;&lt;</a></div>";
                foreach($resultnews as $word => $newnews){
                    if($newnews['newclass']==$newclass['newclass']){
                        echo "<a href='view.php?m=".$newnews['id']."'><span class='index-title'>";
                        echo '标题:'.$newnews['title'].'</span></a><span class="index-time">'.$newnews['settime'].'</span><br/>';
                    }
                }
                echo "</div></div>";
            }
        ?>
    </div>
    <div class="footer">
        <div class='friend-link'>
            <h2>友情链接</h2>
            <ul>
                <?php
                    $sqlfriend = "select * from friendlink";
                    $sthfriend = mysqli_query($connect,$sqlfriend);
                    $resultfriend = mysqli_fetch_all($sthfriend,MYSQLI_ASSOC);
                    foreach($resultfriend as $key => $friend){
                        echo "<li><a href='".$friend['linkurl']."' target='_blank'>".$friend['linkname']."</a></li>";
                    }
                ?>
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