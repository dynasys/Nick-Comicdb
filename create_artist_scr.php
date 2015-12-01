<?php
    if(isset($_POST['cancel'])){
        header("location: artist_edit.php");
    }

    if(isset($_POST['submit'])){
        $lname=$_POST['lname'];
        $fname=$_POST['fname'];
        $birthday=$_POST['birthday'];
        $birthplace=$_POST['birthplace'];
        $nat=$_POST['nat'];
        
        $connection=mysql_connect("localhost", "root", "");
        $db=mysql_select_db("comics", $connection);
        $sql= "INSERT INTO artist(Last_Name, First_Name, Birthday, Birthplace, Nationality)
               VALUES('$lname','$fname','$birthday','$birthplace','$nat')";
        $insert = mysql_query($sql, $connection);
        
        if(! $insert){
            die('could not insert data'. mysql_error());
        }
        mysql_close($connection);
        header("location:artist_edit.php");
    }
?>