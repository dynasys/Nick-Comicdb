<head>
</head>
<body>
    <h2>Add an artist to database</h2>
    <form method="post">
        <br>Last Name<br>
        <input type="text" name="lname">
        <br>First Name<br>
        <input type="text" name="fname">
        <br>Birthday<br>
        <input type="date" name="birthday">
        <br>Birthplace<br>
        <input type="text" name="birthplace">
        <br>Nationality<br>
        <input type="text" name="nat">
        <br><br>
        <input type="submit" name="submit" value="submit">
        <input type="submit" name="cancel" value="cancel">
        <?php include 'create_artist_scr.php' ?>
    </form>
</body>