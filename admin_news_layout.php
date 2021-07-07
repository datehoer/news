<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>China-news-admin</title>
    <link rel="stylesheet" href="../news/css/index.css">
    <script src="../news/js/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="../news/css/admin-layout-css.css">
</head>
<body>
    
    <div class="goback">
        
        <a href="admin_index.php"><input type="button" value="返回上一页"></a>
    </div>
    <div class="allbox">
        <div class="addbox abox">
            <i></i>
            <input type="button" value="轮播图设置" class="bannerbtn">
            
            <div class='bannerbox'>  
                <div>
                    <h4>添加轮播图</h4>
                    <form action="" method="POST">
                        <input type="text" name="bannerurl" id="" placeholder='请输入文章链接'>
                        <input type="text" name="bannerpic" id="" placeholder='请输入文章图片'>
                        <input type="text" name="bannertitle" id="" placeholder='请输入文章标题'><br>
                        <input type="submit" value="添加" name="addbanner">
                    </form>
                </div>
                <div>
                    <h4>删除轮播图</h4>
                    <?php
                        include('config.php');
                        $sql = 'select * from banner';
                        $sth = mysqli_query($connect, $sql);
                        $result = mysqli_fetch_all($sth, MYSQLI_ASSOC);

                        foreach ($result as $keys => $banner) {
                            echo "<input type='text' name='' id='' value=".$banner['url'].">";
                            echo "<input type='text' name='' id='' value=".$banner['pic'].">";
                            echo "<input type='text' name='' id='' value=".$banner['title'].">";
                            echo "<a href='admin_news_layout.php?banner=".$banner['id']."'><input type='button' value='删除'></a><br>";
                        }
                    
                    ?>
                </div>
            </div>
            
        </div>
        <div class="addclass abox">
            <input type="button" value="如果需要增加前台类别，只需要在后台添加类别即可" class="classbtn">
        </div>
        <div class="addfriend abox">
            <i></i>
            <input type="button" value="修改友情链接" class="friendbtn">
            <div class="friendbox">
                <div>
                    <h4>添加友情链接</h4>
                    <form action="" method="POST">
                        <input type="text" name="friendname" id="" placeholder='请输入友链名称'>
                        <input type="text" name="friendurl" id="" placeholder='请输入友链链接'>
                        <input type="text" name="friendpic" id="" placeholder='请输入友链图标(可选)'><br>
                        <input type="submit" value="添加" name="addfriend">
                    </form>
                </div>
                <div>
                    <h4>删除友情链接</h4>
                    <?php
                        include('config.php');
                        $sql = 'select * from friendlink';
                        $sth = mysqli_query($connect, $sql);
                        $result = mysqli_fetch_all($sth, MYSQLI_ASSOC);

                        foreach ($result as $keys => $banner) {
                            echo "<input type='text' name='' id='' value=".$banner['linkname'].">";
                            echo "<input type='text' name='' id='' value=".$banner['linkurl'].">";
                            echo "<input type='text' name='' id='' value=".$banner['linkpic'].">";
                            echo "<a href='admin_news_layout.php?friend=".$banner['id']."'><input type='button' value='删除'></a><br>";
                        }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        include("config.php");
        if (isset($_POST['addbanner'])) {
            $bannerurl = $_POST['bannerurl'];
            $bannerpic = $_POST["bannerpic"];
            $bannertitle = $_POST["bannertitle"];
            $sqladd = "insert into banner (`url`,`pic`,`title`) values('$bannerurl','$bannerpic','$bannertitle');";
            $sthadd = mysqli_query($connect, $sqladd);
            mysqli_close($connect);
            header("Location:admin_news_layout.php");
        }
        if (isset($_GET['banner'])) {
            $bannerid = $_GET['banner'];
            $sqldelete = "delete from banner where id = '$bannerid'";
            mysqli_query($connect, $sqldelete);
            mysqli_close($connect);
            header("Location:admin_news_layout.php");
        }
        if (isset($_POST['addfriend'])) {
            $friendurl = $_POST['friendurl'];
            $friendpic = $_POST["friendpic"];
            $friendname = $_POST["friendname"];
            $sqladd = "insert into friendlink (`linkname`,`linkurl`,`linkpic`) values('$friendname','$friendurl','$friendpic');";
            $sthadd = mysqli_query($connect, $sqladd);
            mysqli_close($connect);
            header("Location:admin_news_layout.php");
        }
        if (isset($_GET['friend'])) {
            $friendid = $_GET['friend'];
            $sqldelete = "delete from friendlink where id = '$friendid'";
            mysqli_query($connect, $sqldelete);
            mysqli_close($connect);
            header("Location:admin_news_layout.php");
        }
    ?>
    <script src="../news/js/layout-js.js"></script>

</body>
</html>