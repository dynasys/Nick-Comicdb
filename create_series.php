<head></head>
<body>
    <h2>Create new series</h2>
    <form method="post">
    <br>Title:<br>
    <input type="text" name="title">
    <br>Number of issues:<br>
    <input type="number" name="issues">
    <br>Start date<br>
    <input type="date" name="start">
    <br>End date<br>
    <input type="date" name="end">
    <br>Genre<br>
    <input type="text" name="genre">
    <br>Publisher<br>
        <?php 
            $connection=mysql_connect("localhost", "root", "");
            $db=mysql_select_db("comics", $connection);
            $sql = "SELECT Publisher_ID, Name FROM publisher";
            $result = mysql_query($sql);
            
            echo "<select name='publisher'>";
            while($row = mysql_fetch_array($result)){
                echo "<option value='".$row['Publisher_ID']."'>".$row['Name']."</option>";
            }
            echo "</select>";
            mysql_close($connection);
        ?>
    <br>
    <br>
    <input type="submit" name="submit" value="submit">
    <input type="submit" name="cancel" value="cancel">
    </form>
</body>

<?php
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $issues=$_POST['issues'];
        $start=$_POST['start'];
        $end=$_POST['end'];
        $genre=$_POST['genre'];
        $publisher=$_POST['publisher'];
        $connection=mysql_connect("localhost","root","");
        $db=mysql_select_db("comics", $connection);
        $sql="INSERT INTO series(Title, Num_Issues, Begin_date, End_date, Genre, Publisher)
              VALUES('$title', '$issues', '$start', '$end','$genre', '$publisher')";
        $insert = mysql_query($sql, $connection);
        
        if(! $insert){
            die('could not insert data'. mysql_error());
        }
        mysql_close($connection);
        header("location:series_edit.php");
        
    }
    if(isset($_POST['cancel'])){
        header("location:series_edit.php");
    }



?>