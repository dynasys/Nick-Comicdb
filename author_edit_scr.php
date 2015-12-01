<?php
        $connection = mysql_connect("localhost", "root", "");
        $db = mysql_select_db("comics", $connection);
        $aid = $_GET['aid'];
        $query = mysql_query("SELECT * FROM author WHERE Author_ID='$aid'", $connection);
        $row = mysql_fetch_row($query);
        $lname = $row[1];
        $fname = $row[2];
        $birthday = $row[3];
        $birthplace = $row[4];
        $nationality = $row[5];

        echo "<h2>Update Author Information</h2>
              <form method='post'>
                <br>Last Name<br>
                <textarea name='lname' rows='1' cols='30'>$lname</textarea>
                <br>First Name<br>    
                <textarea name='fname' rows='1' cols='30'>$fname</textarea> 
                <br>Birthday<br>
                <textarea name='birthday' rows='1' cols='30'>$birthday</textarea>
                <br>Birth Place<br>
                <textarea name='birthplace' rows='1' cols='30'>$birthplace</textarea>
                <br>Nationality<br>
                <textarea name='nationality' rows='1' cols='30'>$nationality</textarea> 
                <br>
                <input type='submit' value='submit' name='submit'>
                <input type='submit' value='cancel' name='cancel'>
                </form>";

        if (isset($_POST['submit'])){
            $lname= $_POST['lname'];
            $fname= $_POST['fname'];
            $birthday= $_POST['birthday'];
            $birthplace=$_POST['birthplace'];
            $nationality=$_POST['nationality'];
            $update= "UPDATE author
                SET Last_Name='$lname',
                First_Name='$fname',
                Birthday='$birthday',
                Birthplace='$birthplace',
                Nationality='$nationality'
                WHERE Author_ID='$aid'";
            if(mysql_query($update, $connection)){
                mysql_close($connection);
                header("location: author_edit.php");
            }
            else{
                die(mysql_error());
            }
        }

        if(isset($_POST['cancel'])){
            header("location: author_edit.php");
        }
?>