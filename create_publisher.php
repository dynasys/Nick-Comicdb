<head></head>
<body>
    <h2>Create new publisher</h2>
    <form method="post">
    <br>Name:<br>
    <input type="text" name="name">
    <br>Year Created:<br>
    <input type="text" name="date">
    <br>Indie?<br>
    <select name="indie">
        <option value="y" selected>Yes</option>
        <option value="n">No</option>
    </select>
    <br>State<br>
    <input type="text" name="state">
    <br>Country<br>
    <input type="text" name="country">
    <br>City<br>
    <input type="text" name="city">
    <br>
    <input type="submit" name="submit" value="submit">
    <input type="submit" name="cancel" value="cancel">
    </form>
</body>

<?php
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $date=$_POST['date'];
        $indie=$_POST['indie'];
        $state=$_POST['state'];
        $country=$_POST['country'];
        $city=$_POST['city'];
        $connection=mysql_connect("localhost","root","");
        $db=mysql_select_db("comics", $connection);
        $sql="INSERT INTO publisher(Name, Date_Created, Indie, State, Country, City)
              VALUES('$name', '$date', '$indie', '$state','$country', '$city')";
        $insert = mysql_query($sql, $connection);
        
        if(! $insert){
            die('could not insert data'. mysql_error());
        }
        mysql_close($connection);
        header("location:publisher_edit.php");
        
    }
    if(isset($_POST['cancel'])){
        header("location:publisher_edit.php");
    }



?>