<!-- 数据库连接配置页面 -->
<?php 
    // $dsn = "mysql:dbname=stu_info;host=localhost";
    // $pdo = new PDO($dsn,'root','root');
    $host = "127.0.0.1:3306";
    $dbuser = "root";
    $dbpassword = "root";
    $connect = mysqli_connect($host,$dbuser,$dbpassword); // 连接mysql
    if(!$connect){
        die("错误信息:".mysqli_error($connect));
    }
    mysqli_set_charset($connect,'utf8');
    mysqli_select_db($connect,'newcms');  // 选择数据库
    // mysqli_query($connect,'use stu_info');  //利用sql执行选择数据库
?>