
<html lang="en">
<head> 
    <title>Comicdb</title>
</head>
<body>
    <h1>Welcome to Comic DB</h1>
    <nav>
        <li><a href="home.php">Home</a></li>
        <li><a href="search.php">Search</a></li>
        <li><b>Add new comic</b></li>
    </nav>
    <p>Don't see one of your favorite comic books? Fill out this form and we will approve it if its valid!<br>
        <small>Everything with an * must be filled out</small></p>
    <?php 
        include 'submit_scr.php';
    ?>
    <br>
    <form method="post"> 
        *ISBN:<br>
        <input type="number" name="isbn">
        <br>
        *Title:<br>
        <input type="text" name="title">
        <br>
        *Issue No. :<br>
        <input type="text" name="issue_no">
        <br>
        *Series:<br>
        <?php
            mysql_connect('localhost', 'root', '');
            mysql_select_db('comics');
        
        
            $sql = "SELECT Series_ID, Title FROM series";
            $result = mysql_query($sql);
            
            echo "<select name='series'>";
            while($row = mysql_fetch_array($result)){
                echo "<option value='".$row['Series_ID']."'>".$row['Title']. "</option>";
            }
            echo "</select>";
        ?>
        <br>
        *Author:<br>
        <?php 
            $sql = "SELECT Author_ID, Last_Name, First_Name FROM author";
            $result = mysql_query($sql);
            
            echo "<select name='author'>";
            while($row = mysql_fetch_array($result)){
                echo "<option value='".$row['Author_ID']."'>".$row['First_Name']. "&nbsp;".$row['Last_Name']."</option>";
            }
            echo "</select>";
        ?>
        <br>
        *Artist:<br>
        <?php 
            $sql = "SELECT Artist_ID, Last_Name, First_Name FROM artist";
            $result = mysql_query($sql);
            
            echo "<select name='artist'>";
            while($row = mysql_fetch_array($result)){
                echo "<option value='".$row['Artist_ID']."'>".$row['First_Name']. "&nbsp;".$row['Last_Name']."</option>";
            }
            echo "</select>";
        ?>
        <br>
        *Release date:<br>
        <input type="date" name="date">
        <br>
        *Publisher:<br>
        <?php 
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
        Genre:<br>
        <input type="text" name="genre">
        <br>
        Price:<br>
        <input type="text" name="price">
        <br>
        <input type="radio" name="radio" value="single">Single Issue<br>
        <input type="radio" name="radio" value="tpb">Trade Paper Back<br>
        <input type="radio" name="radio" value="web">Web Comic<br>
        <input type="submit" name="submit" value="submit"><br>      
    </form>
</body>
</html>