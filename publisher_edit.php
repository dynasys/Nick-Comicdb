<head>
    <style>
        table,th, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h3>Edit/Delete Publisher</h3>
    <nav>
        <li><a href="author_edit.php">Edit/Delete Author</a></li>
        <li><a href="artist_edit.php">Edit/Delete Artist</a></li>
    </nav>
        <li><a href="admin_home.php">Edit/Delete Issue</a></li>
        <li><a href="series_edit.php">Edit/Delete Series</a></li>
        <li><a href="home.php">ComicDB Home</a></li>
    <h4>Here are all the publishers in the database:</h4>
    <table id="publishertbl">
        <caption><h4>Publishers</h4></caption>
        <tr>
            <th>Publisher_ID</th>
            <th>Name</th>
            <th>Date Created</th>
            <th>Indie</th>
            <th>State</th>
            <th>Country</th>
            <th>City</th>
            <th>Option</th>
        </tr>
    
    
    
    
    <?php
        include "publisher_button.php";
        $connection = mysql_connect("localhost", "root", "");
        $db = mysql_select_db("comics", $connection);
        $query = mysql_query("SELECT * FROM publisher", $connection);
    if($query == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}

        while ($row = mysql_fetch_array($query, MYSQL_ASSOC)){  
            $pid=$row["Publisher_ID"];
            echo '<tr>';
                echo '<td>' .$row["Publisher_ID"]. '</td>';
                echo '<td>' .$row["Name"]. '</td>';
                echo '<td>' .$row["Date_Created"]. '</td>';
                echo '<td>' .$row["Indie"]. '</td>';
                echo '<td>' .$row["State"]. '</td>';
                echo '<td>' .$row["Country"]. '</td>';
                echo '<td>' .$row["City"]. '</td>';
                echo '<form method="post">
                    <input type="hidden" name="pid" value="'.$pid.'" >
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
</body>