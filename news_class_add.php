<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../news/css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-olOxEXxDwd20BlATUibkEnjPN3sVq2YWmYOnsMYutq7X8YcUdD6y/1I+f+ZOq/47" crossorigin="anonymous">
    <link rel="stylesheet" href="../news/css/class-add-css.css">
    <script src="../news/js/jquery-1.12.4.min.js"></script>
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
    <div class="add-class">
        <input type="button" value="返回上一级" class="back" onclick="history.back()">
        <form action="" method="get">
            <input type="text" name="newclass" placeholder="请输入要添加的新闻类别" class='text'>
            <input type="submit" value="添加" name='submit' class='editbtn'>
        </form>
    </div>
    <?php
        if(isset($_GET['submit'])){
            include('config.php');
            
            $class =$_GET['newclass'];
            $sql1="select * from new_class where newclass='$class'";
            $sth = mysqli_query($connect,$sql1);
            $result = mysqli_fetch_all($sth);
            $sql = "insert into new_class(`newclass`) values('$class');";
            if(count($result)==0){
                mysqli_query($connect,$sql);
                echo "添加成功";
            }
            else{
                echo "新闻类别已存在";
            }
            mysqli_close($connect);
        }
    
    ?>
    
</body>
</html>