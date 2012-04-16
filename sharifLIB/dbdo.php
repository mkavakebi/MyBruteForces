<?php
try {
    $dbh = new PDO("mysql:host=localhost;dbname=kevair_shlib", 'kavakebi', '123456');
    /*** echo a message saying we have connected ***/
    echo 'Connected to database';
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>
<?php

?>