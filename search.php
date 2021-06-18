<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../news/css/index.css">
    <link rel="stylesheet" href="../news/css/index-css.css">
    <link rel="stylesheet" href="../news/css/search-css.css">
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
       
    </div> <nav>
        <ul>
            <li><a href="">首页</a></li>
            <li><a href="">时事新闻</a></li>
            <li><a href="">财经新闻</a></li>
            <li><a href="">体育新闻</a></li>
            <li><a href="">军事新闻</a></li>
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
    <div class='searchbox'>
        <?php
            include('config.php');
            $titleword = $_GET['search'];
            $searchclass = $_GET['searchclass'];
            if($titleword =='' ||$searchclass ==''){
                echo "搜索词/类不能为空";
            }
            else{
                $sql = "select * from news where $searchclass like '%$titleword%'";
                $sth = mysqli_query($connect,$sql);
                $result = mysqli_fetch_all($sth,MYSQLI_ASSOC);
                if($searchclass == 'newclass'){
                    $searchclass = '类型';
                }
                elseif($searchclass == 'title'){
                    $searchclass = '标题';
                }
                elseif($searchclass == 'adduser'){
                    $searchclass = '作者';
                }
                elseif($searchclass == 'content'){
                    $searchclass = '内容';
                }
                echo "<p class='searchname'>您搜索的".$searchclass."是<i>".$titleword."</i></p><br>";
                echo "搜索到包含 ".$titleword." 内容的数量为:".count($result)."<br><br>";
                foreach($result as $key => $news){
                    echo "<p class='searchcontent'>标题:<a href='view.php?m=".$news['id']."'>".$news['title']."</a></p><br>";
                }
        
            }
            
        ?>
    </div>
</body>
</html>