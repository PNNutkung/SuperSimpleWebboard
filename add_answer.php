<?php
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $dbname = "Board";
    $answerno = $a_answer = $a_name = null;
    if(isset($_GET["answerno"])) $answerno = $_GET["answerno"];
    if(isset($_POST["a_answer"])) $a_answer = $_POST["a_answer"];
    if(isset($_POST["a_name"])) $a_name = $_POST["a_name"];

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "select *
                from Answer
                where aquestionno = $answerno";
        $count = $conn->prepare($sql);
        $count->execute();
        $count = $count->rowCount() + 1;

        $sql2 = "insert into Answer values($answerno,$count,\"$a_answer\",\"$a_name\")";
        $conn->exec($sql2);

        if($conn->query($sql) != false){
            $sql = "update question
                    set qCount = qCount+1
                    where qno = $answerno";
            echo "Answer has been saved into database.<br/><br/>";
            echo "<a href=show_detail.php?item=$answerno>Back to the topic</a><br/>";
            echo "<a href=show_question.php>Webboard Main page</a>";
        }
        else {
            echo "Cannot save answer to database. Please check.";
        }
    } catch (PDOException $e) {
        echo $sql."<br/>".$e->getMessage();
    }
    $conn = null;
?>
