<?php 
    include("config.php");
    $id = $_GET['del'];
    echo $id;
    function del($sql,$connect){
        $sth = mysqli_query($connect,$sql);
    };
    $sql="delete from news where id = '$id'";
    del($sql,$connect);
    mysqli_close($connect);
    header("Location: delete_news.php");
?>