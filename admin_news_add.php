<!-- <?php
    #if(strpos($_SERVER['HTTP_REFERER'],'login.php')===false){
    #header('Location: notfind.php');
    #}
?> -->
<!-- 添加新闻页面 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>China-news-admin</title>
    <link rel="stylesheet" href="../news/css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-olOxEXxDwd20BlATUibkEnjPN3sVq2YWmYOnsMYutq7X8YcUdD6y/1I+f+ZOq/47" crossorigin="anonymous">
    <link rel="stylesheet" href="../news/css/admin-css.css">
    <link rel='stylesheet' href="../news/css/add-css.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/wangeditor@latest/dist/wangEditor.min.js"></script>
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
    <div class="news-add">
        <h3>发布新文章</h3>
        <form action="" method="POST">
            标题:<input type="text" name="title" id="" placeholder="请输入文章标题">
            发布人:<input type="text" name="userName" id="" placeholder="用户名" >
            时间:<input type="datetime-local" name="settime" id="">
            点击量:<input type="number" name="hits" id="">
            
            <div id="div1"></div>
            <textarea class="edit-box" name="content" value="">
            </textarea>
            <div class="news-class">
                <h4>新闻类别</h4>
                <ul>
                    <li><label><input type="checkbox" value="ssnews" name="newsClass" id="">时事新闻</label></li>
                    <li><label><input type="checkbox" value="cjnews" name="newsClass" id="">财经新闻</label></li>
                    <li><label><input type="checkbox" value="tynews" name="newsClass" id="">体育新闻</label></li>
                    <li><label><input type="checkbox" value="jsnews" name="newsClass" id="">军事新闻</label></li>
                </ul>
            </div>
            <input type="submit" value="发布" name="sublime-add" id="add">
        </form>

    </div>
    <?php
        if(isset($_POST["sublime-add"])) {
            include("config.php");
            $title = $_POST["title"];
            $userName = $_POST["userName"];
            $settime = $_POST["settime"];
            $content = $_POST["content"];
            $newsClass = $_POST["newsClass"];
            $hits = $_POST["hits"];
            var_dump($title, $userName, $settime, $content, $newsClass);
            if ($newsClass == "ssnews") {
                $newsClass = "时事新闻";
            } elseif ($newsClass == "cjnews") {
                $newsClass = "财经新闻";
            } elseif ($newsClass == "tynews") {
                $newsClass = "体育新闻";
            } elseif ($newsClass == "jsnews") {
                $newsClass = "军事新闻";
            }
            function write($sql, $connect)
            {
                $sth = mysqli_query($connect, $sql);
            };
            $sql = "insert into news(`newclass`,`title`,`content`,`settime`,`adduser`,`hits`) values('$newsClass','$title','$content','$settime','$userName','$hits');";
            write($sql, $connect);
            mysqli_close($connect);
            header("Location: admin_news_add.php");
        }
    ?>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        const E = window.wangEditor
        const editor = new E("#div1")
        const $text1 = $(".edit-box")
        editor.config.onchange = function(html) {
            // 第二步，监控变化，同步更新到 textarea
            $text1.val(html)
        }
        // 或者 const editor = new E(document.POSTElementById('div1'))

        editor.create()
        $text1.val(editor.txt.html())
    </script>
</body>

</html>