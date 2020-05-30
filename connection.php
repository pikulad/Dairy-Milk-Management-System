
<?php
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "mysql";
        $database = "dudhwala";
        $con= mysqli_connect($dbhost, $dbuser, $dbpass, $database);

        if (!$con) {
            die('count not connect : ' . mysqli_error());
        }
        //echo 'connected successfully';

?>