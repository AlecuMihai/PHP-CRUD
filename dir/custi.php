<?php
    include '../php/db.php';
    include 'getFromQuery.php';

    $conn = OpenCon();

    $sql = "SELECT * FROM `custi`;";
    getFromQuery($sql, $conn, 'cages');
    $conn -> close;
?>