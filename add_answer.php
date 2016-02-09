<?php
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $dbname = "board";
    $answerno = $a_answer = $a_name = null;
    if(isset($_GET["answerno"])) $answerno = $_GET["answerno"];
    if(isset($_POST["a_answer"])) $a_answer = $_POST["a_answer"];
    if(isset($_POST["a_name"])) $a_name = $_POST["a_name"];

    try {
        $conn = new PDO("mysql:host=$host; dbname = $dbname",$user,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "select *
                from Answer
                where aquestionno = $answerno";
        $count = $conn->prepare($sql);
        $count->execute();
        $count++;

        $sql = "insert into Answer values(
                $answerno,
                $count,
                $a_answer,
                $a_name
        )";
    } catch (PDOException $e) {
        echo $sql."<br/>".$e->getMessage();
    }
    $conn = null;
?>
