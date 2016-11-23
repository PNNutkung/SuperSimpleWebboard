<?php
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $dbname = "Board";
    try{
        $conn = new PDO("mysql:host=$host; dbname=$dbname",$user,$pass);
        $sql = "create table Answer(
            aquestionno int(4),
            ano int(4),
            adetail longtext,
            aname varchar(20)
        )";
        $conn->exec($sql);
        echo "Create table Answer successfully.";
    }
    catch(PDOExaception $e){
        echo $sql."<br/>".$e->getMessage();
    }
    $conn = null;
?>
