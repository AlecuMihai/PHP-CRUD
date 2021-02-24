<?php
    function OpenCon(){
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "Parola123";
        $db = "adapost_animale";

        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db)
            or die("Connect failed: %s\n".$conn->error);
        return $conn;
    }

    function CloseConn($conn){
        $conn -> close();
    }
?>