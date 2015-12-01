<?php
	//echo "ECHO Echo echo";
	
if(isset($_POST["Search"])){
	//echo "isset post";
	
	$isbn=$_POST["isbn"];
	$title=$_POST["title"];
	$author=$_POST["author"];
	$artist=$_POST["illustrator"];
	$publisher=$_POST["publisher"];
	//$type=$_POST["type"];
	$genre=$_POST["genre"];
	$price=$_POST["price"];
	$date=$_POST["date"];
	
	$connection = mysql_connect("localhost", "root", "");
	
	$db=mysql_select_db("comics", $connection);
	
	$setUpQuery="SELECT Publisher_ID
				FROM publisher
				WHERE name LIKE '%".$publisher."%'";
				
				
	$result=mysql_query($setUpQuery, $connection);
	$assoc=mysql_fetch_assoc($result);
	$publisherID=$assoc["Publisher_ID"];
	
	echo $publisherID;
	
	$setUpQuery="SELECT Author_ID
				FROM author
				WHERE Last_Name='$author'";
				
	$authorID=mysql_query($setUpQuery, $connection);
	
	$setUpQuery="SELECT Artist_ID
				FROM artist
				WHERE Last_Name='$artist'";
				
	$artistID=mysql_query($setUpQuery, $connection);
	
	if($isbn == null){$isbn = "%";}
	if($title == null){$title = "%";}
	if($author == null){$author = "%";}
	if($artist == null){$artist	= "%";}
	if($publisher == null){$publisher = "%";}
	//if($type == null){$type = "0";}
	if($genre == null){$genre = "%";}
	if($price == null){$price = "%";}
	if($date == null){$date = "%";}
	
	$query="SELECT *
			FROM issue
			WHERE ISBN LIKE '$isbn' AND title LIKE '$$title'";
	
	//if(!mysql_query($query, $connection)){echo "query didn't work";}else{echo"query worked";}
	
	$searchResults=mysql_query($query);	
	
	if(mysql_num_rows($searchResults)==0){echo"Nothing found"; exit;}
	
	while($row=mysql_fetch_array($searchResults)){
		//echo "<tr>";
			echo $row["ISBN"] . "<br>";
			echo $row["title"] . "<br>";
		//echo "</tr>";
	}
	
	mysql_free_result($searchResults);
	
	mysql_close($connection);
}
?>