<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $dbhost="localhost";
            $dbname="root";
            $dbpass="mysql";
            $database="dudhwala";
            $connection= mysqli_connect($dbhost, $dbname, $dbpass, $database);
                    if(!$connection)
                    {
                        echo "database not connected";
                    }
                   
        ?>
    </body>
</html>
