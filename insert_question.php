<?php
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $dbname = "Board";
    $topic = $detail = $name = null;
    if(isset($_POST["topic"])) $topic = $_POST["topic"];
    if(isset($_POST["detail"])) $detail = $_POST["detail"];
    if(isset($_POST["name"])) $name = $_POST["name"];
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "select * from Question";
        $count = $conn->prepare($sql);
        $count->execute();
        $row_count = ($count->rowCount())+1;
        $sql = "insert into Question values($row_count, \"$topic\", \"$detail\", \"$name\", 0)";
        $conn->exec($sql);
        echo "Add new topic to database successfully.<br/>";
    } catch (PDOException $e) {
        echo $sql."<br/>".$e->getMessage();
    }
    $conn = null;
    echo "<a href=\"show_question.php\">Show all topics</a><br/>";
    echo "<a href=\"form_question.html\">Back to previous page</a>";


?>
