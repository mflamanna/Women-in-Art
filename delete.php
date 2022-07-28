<?php
 include './services/connection.php';

    $id= $_GET['delete'];
    $mysqli->query("DELETE from worksofart WHERE id=$id");

    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Deleted');
    window.location.href='index.php';
    </script>");
?>