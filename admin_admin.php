<!-- <?php
    #if(strpos($_SERVER['HTTP_REFERER'],'login.php')===false){
        #header('Location: notfind.php');
    #}
?> -->
<?php 
    include('config.php');
    $sql = "select * from admin";
    $sth = mysqli_query($connect,$sql);
    $result = mysqli_fetch_all($sth,MYSQLI_ASSOC);
?>
<!-- 用户管理页面 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>China-news-admin</title>
    <link rel="stylesheet" href="../news/css/index.css">
    <link rel="stylesheet" href="../news/css/admin_adminlist.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-olOxEXxDwd20BlATUibkEnjPN3sVq2YWmYOnsMYutq7X8YcUdD6y/1I+f+ZOq/47" crossorigin="anonymous">
    
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
        <div class='adminbox'>
            <div class="centerbox">
                <?php
                    foreach($result as $key=>$user){
                        echo "<span>".$user['username']."</span><span>".$user["email"]."</span>";
                        if($user['admin']==1){echo '<span>是管理员</span>';}else{echo '<span>非管理员</span>';};
                        echo "<a href='updateadmin.php?id=".$user['id']."'>修改<a/><a href='deleteadmin.php?id=".$user['id']."'>删除<a/><br/>";
                    }
                ?>
            </div>
        </div>
</body>
</html>