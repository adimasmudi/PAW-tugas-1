<?php

require_once('config.php');
$id = $_GET['id'];
echo 'id' . $id;

$sql = "DELETE FROM tbl_adi WHERE id_adi=$id";
$stmt = $db->prepare($sql);
$saved = $stmt->execute();

if ($saved) header('Location:index.php');
