<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>China-news-admin</title>
    <link rel="stylesheet" href="../news/css/index.css">
    <script src="../news/js/jquery-1.12.4.min.js"></script>
</head>
<body>
    <div class="allbox">
        <div class="addbox">
            <div class='bannerbox'>
                <input type="button" value="轮播图设置">
                <div>
                    <h4>添加轮播图</h4>
                    <form action="" method="POST">
                        <input type="text" name="url" id="" placeholder='请输入文章链接'>
                        <input type="text" name="pic" id="" placeholder='请输入文章图片'>
                        <input type="text" name="title" id="" placeholder='请输入文章标题'><br>
                        <input type="submit" value="添加" name="addbanner">
                    </form>
                </div>
                <div>
                    <h4>删除轮播图</h4>
                    <?php
                        include('config.php');
                        $sql = 'select * from banner';
                        $sth = mysqli_query($connect,$sql);
                        $result = mysqli_fetch_all($sth,MYSQLI_ASSOC);

                        foreach($result as $keys => $banner){
                            echo "<input type='text' name='' id='' value=".$banner['url'].">";
                            echo "<input type='text' name='' id='' value=".$banner['pic'].">";
                            echo "<input type='text' name='' id='' value=".$banner['title'].">";
                            echo "<a href='admin_news_layout.php?banner=".$banner['id']."'><input type='button' value='删除'></a><br>";
                        }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        include("config.php");
        if(isset($_POST['addbanner'])){
            $url = $_POST['url'];
            $pic = $_POST["pic"];
            $title = $_POST["title"];
            $sqladd = "insert into banner (`url`,`pic`,`title`) values('$url','$pic','$title');";
            $sthadd = mysqli_query($connect,$sqladd);
            mysqli_close($connect);
            header("Location:admin_news_layout.php");
        }
        if(isset($_GET['banner'])){
            $id = $_GET['banner'];
            $sqldelete = "delete from banner where id = '$id'";
            mysqli_query($connect,$sqldelete);
            mysqli_close($connect);
            header("Location:admin_news_layout.php");
        }
    ?>
</body>
</html>