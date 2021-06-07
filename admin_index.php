<!-- <?php
    #if(strpos($_SERVER['HTTP_REFERER'],'login.php')===false){
        #header('Location: notfind.php');
    #}
    ?> -->
<!-- 后台管理主页面 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>China-news-admin</title>
    <script src="../news/js/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="../news/css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-olOxEXxDwd20BlATUibkEnjPN3sVq2YWmYOnsMYutq7X8YcUdD6y/1I+f+ZOq/47" crossorigin="anonymous">
    <link rel="stylesheet" href="../news/css/admin-index-css.css">
</head>
<body>
    <!-- <script>
        alert("登录成功")
    </script> -->
    <div class="body">
        <h1>后台管理</h1>
        <div class="admin-logout admin-box">
            <a href="admin-logout.php?go=logout">退出登录</a>
        </div>
        <div class="admin-index admin-box">
            <a href="index.php">返回主页</a>
        </div>
        <div class="admin-flex admin-box">
            <a href="admin_news_layout.php">页面布局</a>
        </div>
        <div class="admin-add admin-box">
            <a href="admin_news_add.php">添加新闻</a>
        </div>
        <div class="admin-del admin-box">
            <a href="delete_news.php">删除新闻</a>
        </div>
        <div class="admin-update admin-box">
            <a href="admin_news_up.php">修改新闻</a>
        </div>
        <div class="admin-list admin-box">
            <a href="admin_news_list.php">新闻列表</a>
        </div>
        <div class="admin-user admin-box">
            <a href="admin_admin.php">用户操作</a>
        </div>
        <div class="admin-class admin-box">
            <a href="admin_news_fl.php">新闻类别</a>
        </div>
    </div>
</body>
</html>