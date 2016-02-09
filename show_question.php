<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Webboard Main page</title>
    </head>
    <body>
        <h2>All topics</h2>
        <?php
            $host = "localhost";
            $user = "root";
            $pass = "1234";
            $dbname = "Board";
            try{
                $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sql = "select *
                        from Question
                        order by qno Desc";
                $questions = $conn->prepare($sql);
                $questions->execute();
                echo "<table style=\"width:100%\" border=\"1\" border=\"black\"";
                echo "<tr><td>Q No.</td><td>Topic Name</td><td>Replies</td>";
                foreach ($conn->query($sql) as $row) {
                    echo "<tr>";
                    $no = $row["qno"];
                    echo "<td>".$no."</td>\n\t\t";
                    echo "<td><a href=\"show_detail.php?item=$no\">".$row["qtopic"]."</a> ";
                    echo " by ".$row["qname"]."</td>\n\t\t";
                    echo "<td>".$row["qcount"]."</td>\n\t";
                    echo "</tr>\n";
                }
                echo "</table>";
            }
            catch(PDOException $e){
                echo $sql."<br/>".$e->getMessage();
            }
            $conn = null;
        ?>
        <hr><a href="form_question.html">Add new topic</a></hr>
    </body>
</html>
