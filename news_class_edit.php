<?php
    if(isset($_GET['id'])){
        include("config.php");
        $id = $_GET['id'];
        $sql = "select * from new_class where id='$id'";
        $sth = mysqli_query($connect,$sql);
        $result = mysqli_fetch_all($sth,MYSQLI_ASSOC);
    }
    else{
        $id=false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../news/css/index.css">
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
    <form action="" method="get">
        <input type="text" name="newclass" value="<?php if($id){echo $result[0]['newclass'];}?>">
        <?php
            if(isset($_GET['id'])){
                echo "<input type='hidden' name='id' readonly value='".$id."'>";
            }
        ?>
        <input type="submit" value="添加" name='submit' id='submit'>
    </form>
    <?php
        if(isset($_GET['id'])){
            echo '<script>document.getElementById("submit").value = "修改";</script>';
            if(isset($_GET['submit'])){
                include('config.php');
                $class =$_GET['newclass'];
                $sql = "update new_class set `newclass` = '$class' where id = '$id';";
                mysqli_query($connect,$sql);
                echo "修改成功";
                mysqli_close($connect);
            }
        }
        else{
            if(isset($_GET['submit'])){
                include('config.php');
                $class =$_GET['newclass'];
                $sql = "insert into new_class(`newclass`) values('$class');";
                mysqli_query($connect,$sql);
                echo "添加成功";
                mysqli_close($connect);
            }
        }
    
    ?>
</body>
</html>