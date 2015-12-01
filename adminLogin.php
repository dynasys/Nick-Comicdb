
<html lang='en'> 
<head> 
    <title>COMIC DATABASE</title>
</head>
<body>
    <header>
		<h2>Comic DB - Admin Login</h2>
    </header>
    <div id="container">
        <form method="post" class="log">
            <input type="text" id="username" name="username" placeholder="username">
            <input type="password" id="password" name="password" placeholder="password">
            <input type="submit" value="login" name="login"><br>
            <?php
            include 'log.php';
            ?>
        </form>
    </div>
    <div id="Block"> 
        <h2>Welcome Admin!</h2>
        <p>If you are not an administrator please <a href="comicsHome.php">here</a>.</p>       
    </div>
</body>
    