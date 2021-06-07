<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../news/css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-olOxEXxDwd20BlATUibkEnjPN3sVq2YWmYOnsMYutq7X8YcUdD6y/1I+f+ZOq/47" crossorigin="anonymous">
    <link rel="stylesheet" href="../news/css/class-edit-css.css">
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

    <?php
        include('config.php');
        $sql = 'select * from new_class';
        $sth = mysqli_query($connect,$sql);
        $result = mysqli_fetch_all($sth,MYSQLI_ASSOC);
        ?>
    <div class="editbox">
        <?php
            foreach($result as $key => $newclass){
                echo "<div class='edit-box'><div>类别:".$newclass['newclass']."</div>";
                echo "<a href='news_class_edit.php?id=".$newclass['id']."'><input type='button' value='修改'></a>";
                echo "<a href='news_class_delete.php?del=".$newclass['id']."'><input type='button' value='删除' class='delete'></a></div><br/>";
            }
            if(isset($_GET['del'])){
                $id = $_GET['del'];
                echo "<script>
                        if(confirm('你确定要删除这个新闻类么')){
                            window.location.href='news_class_deleterun.php?del=".$id."'
                        }
                        else{
                            window.location.href ='news_class_delete.php'
                        }
                </script>";
            }
        ?>
    </div>
    
</body>
</html>