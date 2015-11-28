    <head>
    </head>
    <body>
        <h2>Edit Issue</h2>
    <b>**NOTE**</b><br>
    Make sure author, artist, series, and publisher are correct. They default to the first in the database.
    <br><br>
    <?php
        $connection = mysql_connect("localhost", "root", "");
        $db = mysql_select_db("comics", $connection);
        $ISBN = $_GET['ISBN'];
        $query = mysql_query("SELECT * FROM issue WHERE isbn='$ISBN'", $connection);
        $row = mysql_fetch_row($query);
        $title = $row[1];
        $date = $row[2];
        $number = $row[3];
        $price = $row[4];
        $genre = $row[5];
        $type = $row[6];
        $publisher = $row[7];
        $series = $row[8];
        $author = $row[9];
        $artist = $row[10];
        
        echo "<form method='post'>
                ISBN<br>
                <textarea name='isbn' rows='1' cols='30'>$ISBN</textarea>
                <br>Title<br>
                    <textarea name='title' rows='1' cols='30'>$row[1]</textarea>
                <br>Release Year<br>
                    <textarea name='date' rows='1' cols='30'>$row[2]</textarea>
                <br>Issue Number<br>
                    <textarea name='number' rows='1' cols='30'>$row[3]</textarea>
                <br>Price<br>
                    <textarea name='price' rows='1' cols='30'>$row[4]</textarea>
                <br>Genre<br>
                    <textarea name='genre' rows='1' cols='30'>$row[5]</textarea>
                <br>Book Type<br>
                    <select name='select'>
                        <option value='Single' selected>Single Issue</option>
                        <option value='TPB'>Trade Paper Back</option>
                        <option value='Web'>Web Comic</option>
                    </select>
                <br>Publisher<br>";
                mysql_connect('localhost', 'root', '');
                mysql_select_db('comics');
                $sql = "SELECT Publisher_ID, Name FROM publisher";
                $result = mysql_query($sql);
            
                echo "<select name='publisher'>";
                while($row = mysql_fetch_array($result)){
                    echo "<option value='".$row['Publisher_ID']."'>".$row['Name']."</option>";
                }
        echo    "</select>
                 <br>Series<br>";
                    $sql = "SELECT Series_ID, Title FROM series";
                    $result = mysql_query($sql);
            
                    echo "<select name='series'>";
                    while($row = mysql_fetch_array($result)){
                        echo "<option value='".$row['Series_ID']."'>".$row['Title']. "</option>";
                    }
        echo    "</select>
                <br>Author<br>";
                    $sql = "SELECT Author_ID, Last_Name, First_Name FROM author";
                    $result = mysql_query($sql);
            
                    echo "<select name='author'>";
                    while($row = mysql_fetch_array($result)){
                        echo "<option value='".$row['Author_ID']."'>".$row['First_Name']. "&nbsp;".$row['Last_Name']."
                        </option>";
                    }
        echo    "</select>
                <br>Artist<br>";
                    $sql = "SELECT Artist_ID, First_Name, Last_Name FROM artist";
                    $result = mysql_query($sql);
                    
                    echo "<select name='artist'>";
                    while($row = mysql_fetch_array($result)){
        echo            "<option value='".$row['Artist_ID']."'>".$row['First_Name']. "&nbsp;".$row['Last_Name']."
                            </option>";
                    }
        echo    "</select>";
                mysql_close($connection);
    ?>
                <br>
                <input type='hidden' name='isbn' value='<?php echo $ISBN;?>'>
                <input type='submit' value='submit' name='submit'>
                <input type='submit' value='cancel' name='cancel'>
                </form>
                <?php 
                    include 'issue_edit_scr.php';
                ?>
</body>
