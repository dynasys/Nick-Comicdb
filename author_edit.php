<head>
    <style>
        table,th, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h2>Edit Author</h2>
    <nav>
        <li><a href="admin_home.php">Edit/Delete Issue</a></li>
        <li><a href="artist_edit.php">Edit/Delete Artist</a></li>
    </nav>
        <li><a href="publisher_edit.php">Edit/Delete Publisher</a></li>
        <li><a href="series_edit.php">Edit/Delete Series</a></li>
    <b>Here are all the authors in the database:</b>
     <table id="authortbl">
        <caption><h4>Issues</h4></caption>
        <tr>
            <th>ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Birthday</th>
            <th>Birthplace</th>
            <th>Nationality</th>
            <th>Option</th>
        </tr>
        <?php
            include "author_button.php";
            $connection = mysql_connect("localhost", "root", "");
            $db = mysql_select_db("comics", $connection);
            $query = mysql_query("SELECT * FROM author", $connection);
            if($query == FALSE) { 
                die(mysql_error()); // TODO: better error handling
            }

            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)){  
            
            $aid=$row["Author_ID"];
            echo '<tr>';
                echo '<td>' .$row["Author_ID"]. '</td>';
                echo '<td>' .$row["Last_Name"]. '</td>';
                echo '<td>' .$row["First_Name"]. '</td>';
                echo '<td>' .$row["Birthday"]. '</td>';
                echo '<td>' .$row["Birthplace"]. '</td>';
                echo '<td>' .$row["Nationality"]. '</td>';
                echo '<form method="post">
                    <input type="hidden" name="aid" value="'.$aid.'" >
                    <td><input type="submit" value="edit" name="edit">
                    <input type="submit" value="delete" name="delete"</td>
                  </form>';
                echo '</tr>';
        }
    
    
    ?>
    </table>    
            <form method="post">
            <input type="submit" value="Add New.." name="add_author">
            </form>
        <?php include"author_edit_button.php" ?>
</body>