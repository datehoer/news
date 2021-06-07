<?php
    include('config.php');
    $id = $_GET['del'];
    $sql2 = "delete from new_class where id ='$id'";
    mysqli_query($connect,$sql2);
    mysqli_close($connect);
    header("Location:news_class_delete.php");
?>