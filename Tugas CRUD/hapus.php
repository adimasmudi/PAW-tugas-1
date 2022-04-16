<?php

    require_once('config.php');
    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_160 WHERE id=$id";
    $stmt = $db->prepare($sql);
    $saved = $stmt->execute();

    if($saved) header('Location:index.php');

?>