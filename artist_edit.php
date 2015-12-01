<head>
    <style>
        table,th, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
	<h2>Edit Artist</h2>
	<nav>
		<li><a href="admin_home.php">Edit/Delete Issue</a></li>
        <li><a href="author_edit.php">Edit/Delete Author</a></li>
    </nav>
        <li><a href="publisher_edit.php">Edit/Delete Publisher</a></li>
        <li><a href="series_edit.php">Edit/Delete Series</a></li>
        <li><a href="home.php">ComicDB Home</a></li>
	<b>Here are all the artists in the database:</b>
		<table id="artistbl">
			<caption><h4>Artists</h4></caption>
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
				include "artist_button.php";
				$connection = mysql_connect("localhost", "root", "");
				$db = mysql_select_db("comics", $connection);
				$query = mysql_query("SELECT * FROM artist", $connection);
				if($query == FALSE){
					die(mysql_error());
				}
				
				while ($row = mysql_fetch_array($query, MYSQL_ASSOC)){
					$aid=$row["Artist_ID"];
					echo "<tr>" .
						"<td>" . $row["Artist_ID"] . "</td>" .
						"<td>" . $row["Last_Name"]. '</td>' .
						'<td>' .$row["First_Name"]. '</td>' .
						'<td>' .$row["Birthday"]. '</td>' . 
						'<td>' .$row["Birthplace"]. '</td>' . 
						'<td>' .$row["Nationality"]. '</td>' . 
						'<form method="post">
							<input type="hidden" name="aid" value="'.$aid.'" >
							<td><input type="submit" value="edit" name="edit">
							<input type="submit" value="delete" name="delete"</td>
						</form>' . 
						"</tr>";
				}
			?>
			</table>
		<form method="post">
		<input type="submit" value="Add New.." name="add_artist">
		</form>
	<?php include"artist_edit_button.php" ?>
</body>