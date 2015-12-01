<head>
    <style>
        table,th, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
	<h2>Edit Series</h2>
	<nav>
		<li><a href="admin_home.php">Edit/Delete Issue</a></li>
        <li><a href="author_edit.php">Edit/Delete Author</a></li>
    </nav>
        <li><a href="publisher_edit.php">Edit/Delete Publisher</a></li>
        <li><a href="artist_edit.php">Edit/Delete Artists</a></li>
        <li><a href="home.php">ComicDB Home</a></li>
	<b>Here are all the artists in the database:</b>
		<table id="artistbl">
			<caption><h4>Series</h4></caption>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Number of Issues</th>
				<th>Date Started</th>
				<th>Date Finished  </th>
				<th>Genre</th>
                <th>Publisher</th>
				<th>Option</th>
			</tr>
			<?php
				include "series_button.php";
				$connection = mysql_connect("localhost", "root", "");
				$db = mysql_select_db("comics", $connection);
				$query = mysql_query("SELECT * FROM series", $connection);
				if($query == FALSE){
					die(mysql_error());
				}
				
				while ($row = mysql_fetch_array($query, MYSQL_ASSOC)){
                    $pub_query = mysql_query('SELECT Name FROM publisher WHERE 
                    Publisher_ID='.$row["Publisher"].'',$connection );
                    $pub_row = mysql_fetch_row($pub_query);
                    $pub = $pub_row[0];
                    $sid=$row["Series_ID"];
					echo "<tr>".
						"<td>" . $row["Series_ID"] . "</td>" .
						"<td>" . $row["Title"]. '</td>' .
						'<td>' .$row["Num_Issues"]. '</td>' .
						'<td>' .$row["Begin_date"]. '</td>' . 
						'<td>' .$row["End_date"]. '</td>' . 
						'<td>' .$row["Genre"]. '</td>' .
                        '<td>' .$pub. '</td>'.
						'<form method="post">
							<input type="hidden" name="sid" value="'.$sid.'" >
							<td><input type="submit" value="edit" name="edit">
							<input type="submit" value="delete" name="delete"</td>
						</form>' . 
						"</tr>";
				}
			?>
			</table>
		<form method="post">
		<input type="submit" value="Add New.." name="create">
		</form>
	<?php include"series_edit_button.php" ?>
</body>