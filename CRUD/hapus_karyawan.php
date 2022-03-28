<?php
    require_once('config.php');
    // Program to display URL of current page.
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $link = "https";
    else $link = "http";

    // Here append the common URL characters.
    $link .= "://";

    // Append the host(domain name, ip) to the URL.
    $link .= $_SERVER['HTTP_HOST'];

    // Append the requested resource location to the URL
    $link .= $_SERVER['REQUEST_URI'];

    $id = explode('=',explode('?',$link)[1])[1];

    $sql = "DELETE FROM karyawan WHERE id_karyawan=$id";
    $stmt = $db->prepare($sql);
    $saved = $stmt->execute();

    if($saved) header('Location:index.php');




?>