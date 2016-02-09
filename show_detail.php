<?php
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $dbname = "board";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        function renHTML($strTemp){
            return nl2br(htmlspecialchars($strTemp));
        }

        $sql = "select *
                from Question
                where qno=$_GET[\"item\"]";
        $dbarr = $conn->query($sql);
    } catch (PDOException $e) {
        echo $sql."<br/>".$e->getMessage();
    }
    $conn = null;
?>

Question <b>
<?php

?>
