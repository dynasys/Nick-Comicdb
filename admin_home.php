<head>
    <style>
        table,th, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h3>Edit/Delete Issues</h3>
    <nav>
        <li><a href="author_edit.php">Edit/Delete Author</a></li>
        <li><a href="artist_edit.php">Edit/Delete Artist</a></li>
    </nav>
        <li><a href="publisher_edit.php">Edit/Delete Publisher</a></li>
        <li><a href="series_edit.php">Edit/Delete Series</a></li>
        <li><a href="home.php">ComicDB Home</a></li>
    <h4>Here are all the issues in the database:</h4>
    <table id="issuetbl">
        <caption><h4>Issues</h4></caption>
        <tr>
            <th>ISBN</th>
            <th>Title</th>
            <th>Date</th>
            <th>Number</th>
            <th>Price</th>
            <th>Genre</th>
            <th>Type</th>
            <th>Publisher</th>
            <th>Series</th>
            <th>Author</th>
            <th>Artist</th>
            <th>Option</th>
        </tr>
    
    
    
    
    <?php
        include "issue_button.php";
        $connection = mysql_connect("localhost", "root", "");
        $db = mysql_select_db("comics", $connection);
        $query = mysql_query("SELECT * FROM issue", $connection);
        if($query == FALSE) { 
            die(mysql_error()); // TODO: better error handling
        }

        while ($row = mysql_fetch_array($query, MYSQL_ASSOC)){  
            $pub_query = mysql_query('SELECT Name FROM publisher WHERE Publisher_ID ='.$row["publisher"].'',$connection );
            $pub_row = mysql_fetch_row($pub_query);
            $pub = $pub_row[0];
            
            $series_query = mysql_query('SELECT Title FROM series WHERE Series_ID ='.$row["series"].'',$connection );
            $series_row = mysql_fetch_row($series_query);
            $series = $series_row[0];
            
            $author_query = mysql_query('SELECT Last_Name FROM author WHERE Author_ID ='.$row["author"].'',$connection );
            $author_row = mysql_fetch_row($author_query);
            $author = $author_row[0];
            
            $artist_query = mysql_query('SELECT Last_Name FROM artist WHERE Artist_ID ='.$row["artist"].'',$connection );
            $artist_row = mysql_fetch_row($artist_query);
            $artist = $artist_row[0];
            
            $ISBN=$row["ISBN"];
            echo '<tr>';
                echo '<td>' .$row["ISBN"]. '</td>';
                echo '<td>' .$row["title"]. '</td>';
                echo '<td>' .$row["issue_date"]. '</td>';
                echo '<td>' .$row["issue_number"]. '</td>';
                echo '<td>$' .$row["price"]. '</td>';
                echo '<td>' .$row["genre"]. '</td>';
                echo '<td>' .$row["book_type"]. '</td>';
                echo '<td>' .$pub. '</td>';
                echo '<td>' .$series. '</td>';
                echo '<td>' .$author. '</td>';
                echo '<td>' .$artist. '</td>';
                echo '<form method="post">
                    <input type="hidden" name="isbn" value="'.$ISBN.'" >
                    <td><input type="submit" value="edit" name="edit">
                    <input type="submit" value="delete" name="delete"</td>
                  </form>';
                echo '</tr>';
        }
    
    
    ?>
    </table>    
    
    <form method="post">
        <input type="submit" value="Create New..." name="create">
    </form>
    <?php
        if (isset($_POST['create'])){
            header("location:submit.php");
        }
    ?>
</body>
