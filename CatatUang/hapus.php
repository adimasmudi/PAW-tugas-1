<?php

require_once('config.php');
require_once "auth.php";
$id = $_GET['id'];

$sql = "DELETE FROM catatan WHERE ID_catatan=$id";
$stmt = $db->prepare($sql);
$saved = $stmt->execute();

if ($saved) header('Location:index.php');
