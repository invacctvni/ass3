<?php
try {
    $conn=new PDO('mysql:host=172.31.22.43;dbname=Jiaqi200477892', 'Jiaqi200477892', 'WH-tstIK2E');
    //set PDO error mode to exception
    // PDO: ATTR_ERRMODE: error reporting.
    // PDO: ERRMODE_EXCEPTION: Throw exceptions. See
    $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo 'Connection Fail: ' . $e->getMessage();
}

?>