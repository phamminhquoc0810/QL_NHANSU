<?php
    require_once("entities/nhanvien.class.php");
    require_once("config/db.class.php");
    $db = new Db(); 
    $connection = $db->connect();
    $this_id = $_GET['this_id'];
    
    echo $this_id;
    $sql = " DELETE FROM nhanvien WHERE Ma_NV='$this_id' ";

    mysqli_query($connection,$sql);
    header( 'location: list_nhanvien.php');
?>