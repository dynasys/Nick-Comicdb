<?php
	//echo "ECHO Echo echo";
	
if(isset($_POST["Search"])){
	//echo "isset post";
	
	$searchType=$_POST["searchType"];
	$searchValue=$_POST["searchValue"];
	
	//echo "<br>" . $searchType . "<br>" . $searchValue . "<br>";
	
	$connection = mysql_connect("localhost", "root", "");
	
	$db=mysql_select_db("comics", $connection);
	
	$query="SELECT issue.*, publisher.name as publisher_name, series.Title as series_title, author.Last_Name as author_name_last, artist.Last_Name as artist_name_last
			FROM issue
				INNER JOIN publisher
					ON publisher.Publisher_ID = issue.publisher
				INNER JOIN series
					ON series.Series_ID = issue.series
				INNER JOIN author
					ON author.Author_ID = issue.author
				INNER JOIN artist
					ON artist.Artist_ID = issue.artist
			WHERE ".$searchType." LIKE '%".$searchValue."%'";
	
	//echo $query;
	
	//if(!mysql_query($query, $connection)){echo "query didn't work";}else{echo"query worked";}
	
	$searchResults=mysql_query($query);	
	
	if(mysql_num_rows($searchResults)==0){echo"Nothing found"; exit;}
	
	while($row=mysql_fetch_assoc($searchResults)){
		//echo "<tr>";
			echo "<br>ISBN: " . $row["ISBN"] . "<br>" . 
				"Title: " . $row["title"] . "<br>" .
				"Issue Date: " . $row["issue_date"] . "<br>" .
				"Issue Number: " . $row["issue_number"] . "<br>" .
				"Original Price: " . $row["price"] . "<br>" .
				"Genre: " . $row["genre"] . "<br>" .
				"Book Type: " . $row["book_type"] . "<br>" . 
				"Publisher: " . $row["publisher_name"] . "<br>" .
				"Series: " . $row["series_title"] . "<br>" .
				"Author: " . $row["author_name_last"] . "<br>" .
				"Illustrator: " . $row["artist_name_last"] . "<br>";
		//echo "</tr>";
	}
	
	mysql_free_result($searchResults);
	
	mysql_close($connection);
}
?>