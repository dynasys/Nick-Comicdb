<html>
<head>
	<title>Comic DB</title>
</head>
<body>
	<header><h2>Comic DB - Search</h2></header>
	
	<nav>
		<ul>
			<li><a href="home.php" title="Home" class="main">Home</a></li>
			<li><b>Search</b></li>
			<li><a href="submit.php" title="Submit" class="main">Submit</a></li>
		</ul>
	</nav>
	
	<form method="post" action="" id="search_box" class="search">
		<select name="searchType">
			<option value="issue.title" selected>Title</option>
			<option value="issue.ISBN">ISBN</option>
			<option value="author.Last_Name">Author</option>
			<option value="artist.Last_Name">Illustrator</option>
			<option value="publisher.Name">Publisher</option>
			<option value="series.title">Series</option>
			<option value="issue.genre">Genre</option>
			<option value="issue.price">Price</option>
			<option value="issue.date">Date</option>
		</select>
		<br>
		<input type="text" name="searchValue" placeholder="" id="searchValue">
		<br>
		<input type="Submit" value="Search" name="Search"><br>
		
		<?php
			include "searchComicScript.php";
		?>
	</form>
	
	
	
	<!-- ISBN, Title, author, illustrator, publisher, trade or paper, single issue, genre, price, issue date  -->
	
	<footer>
		<br>
		<a href="admin.php" title="admin" class="main">Admin Login</a><br>
	</footer>
	
</body>
</html>