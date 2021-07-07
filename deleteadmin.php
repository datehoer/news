<?php
    include("config.php");
    $delete=$_GET['id'];
    $sqlt = "delete from admin where id = '$delete';";
    $stht = mysqli_query($connect,$sqlt);
    mysqli_close($connect);
    header("Location: admin_admin.php");
?>