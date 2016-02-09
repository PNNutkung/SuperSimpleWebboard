<?php
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $dbname = "Board";
    /*try{
        $conn = new PDO("mysql:host=$host",$user,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "create database Board";
        $conn->exec($sql);
        echo "Create database successfully.<br/>\n";
    } catch(PDOExaception $e){
        echo $sql."<br/>".$e->getMessage();
    }
    $conn = null;
    try{
        $conn = new PDO("mysql:host=$host; dbname=$dbname",$user,$pass);
        $sql = "create table Question(
            qno int(4),
            qtopic varchar(50),
            qdetail longtext,
            qname varchar(20),
            qcount int(4)
        )";
        $conn->exec($sql);
        echo "Create table Question successfully.<br/>";
    }
    catch(PDOExaception $e){
        echo $sql."<br/>".$e->getMessage();
    }
    $conn = null;*/

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
