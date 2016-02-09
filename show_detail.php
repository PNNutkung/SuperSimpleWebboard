<?php
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $dbname = "board";

    $item = null;
    if(isset($_GET["item"])) $item = $_GET["item"];
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        function renHTML($strTemp){
            return nl2br(htmlspecialchars($strTemp));
        }

        $sql = "select *
                from Question
                where qno = $item";
        $dbarr = $conn->prepare($sql);
        $dbarr->execute();
        $qrow = $dbarr->fetch();
    } catch (PDOException $e) {
        echo $sql."<br/>".$e->getMessage();
    }
    $conn = null;
?>

Question
<b>
<?php
    echo renHTML($qrow["qtopic"]);
?>
</b><br>

<table width="100%" border="1" bgcolor="#e0e0e0" border="black">
    <tr>
        <td>
            <?php
                echo renHTML($qrow["qdetail"]);
            ?><br/>
            by <b>
                <?php
                    echo renHTML($qrow["qname"]);
                ?>
            </b>
        </td>
    </tr>
</table><br/>
<?php
    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "select *
                from Answer
                where aquestionno = $item";
        $count = $conn->prepare($sql);
        $count->execute();
        if($count->rowCount() > 0) {
            foreach ($conn->query($sql) as $row) {
?>
Answer No.<b>
<?php
                echo $row["ano"];
?>
</b><br/>
    <table width="100%" border="1">
        <tr>
            <td>
<?php
                echo renHTML($row["adetail"]);
?><br/>
by <b>
<?php
                echo renHTML($row["aname"]);
?>
                </b>
            </td>
        </tr>
<?php
            }
        }
    }
    catch(PDOException $e){
        echo $sql."<br/>".$e->getMessage();
    }

    echo "<form method=post action=add_answer.php?answerno=$item>";
    $conn = null;
?>
Answer: <br/>
<textarea name="a_answer" rows="5" cols="40"></textarea><br/><br/>
Name: <input type="text" name="a_name" size="30"><br/><br/>
<input type="submit" value="Send">&nbsp;
<input type="reset" value="Cancel">
</form>
