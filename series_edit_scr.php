<?php
            $connection=mysql_connect("localhost", "root", "");
            $db=mysql_select_db("comics",$connection);
            $sid=$_GET['sid'];
            $query = mysql_query("SELECT * FROM series WHERE Series_ID='$sid'", $connection);
            $row = mysql_fetch_row($query);
            
            echo "<form method='post'>
                Seried ID<br>
                <textarea name='sid' rows='1' cols='30'>$sid</textarea>
                <br>Title<br>
                    <textarea name='title' rows='1' cols='30'>$row[1]</textarea>
                <br>Number of issues<br>
                    <textarea name='issues' rows='1' cols='30'>$row[2]</textarea>
                <br>Start date<br>
                    <textarea name='start' rows='1' cols='30'>$row[3]</textarea>
                <br>End date<br>
                    <textarea name='end' name='price' rows='1' cols='30'>$row[4]</textarea>
                <br>Genre<br>
                    <textarea name='genre' rows='1' cols='30'>$row[5]</textarea>
                <br>Publisher<br>";
                mysql_connect('localhost', 'root', '');
                mysql_select_db('comics');
                $sql = "SELECT Publisher_ID, Name FROM publisher";
                $result = mysql_query($sql);
                echo "<select name='publisher'>";
                while($row = mysql_fetch_array($result)){
                    echo "<option value='".$row['Publisher_ID']."'>".$row['Name']."</option>";
                }
            echo"
                 <form method='post'>
                <br>
                 <input type='submit' value='submit' name='submit'>
                 <input type='submit' value='cancel' name='cancel'>
                 </form>";
                
            if(isset($_POST['submit'])){
                $title= $_POST['title'];
                $issues= $_POST['issues'];
                $start= $_POST['start'];
                $end=$_POST['end'];
                $genre=$_POST['genre'];
                $publisher=$_POST['publisher'];
                $update= "UPDATE series
                    SET Title='$title',
                    Num_Issues='$issues',
                    Begin_date='$start',
                    End_date='$end',
                    Genre='$genre',
                    Publisher='$publisher'
                    WHERE Series_ID='$sid'";
                if(mysql_query($update, $connection)){
                    mysql_close($connection);
                    header("location: series_edit.php");
                }
                else{
                    die(mysql_error());
                }
        }
                mysql_close($connection);
        if (isset($_POST['cancel'])){
            header("location:series_edit.php");
        }
?>
