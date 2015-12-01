<?php
        $connection = mysql_connect("localhost", "root", "");
        $db = mysql_select_db("comics", $connection);
        $pid = $_GET['pid'];
        $query = mysql_query("SELECT * FROM publisher WHERE Publisher_ID='$pid'", $connection);
        $row = mysql_fetch_row($query);
        $name = $row[1];
        $date = $row[2];
        $indie = $row[3];
        $state = $row[4];
        $country = $row[5];
        $city=$row[6];
        echo "<h2>Update Publisher Information</h2>
              <form method='post'>
                <br>Name<br>
                <textarea name='name' rows='1' cols='30'>$name</textarea>
                <br>Year Created<br>    
                <textarea name='date' rows='1' cols='30'>$date</textarea> 
                <br>Indie?<br>
                <select name='indie'>
                    <option value='y' selected>Yes</option>
                    <option value='n'>No</option>
                </select>
                <br>State<br>
                <textarea name='state' rows='1' cols='30'>$state</textarea>
                <br>Country<br>
                <textarea name='country' rows='1' cols='30'>$country</textarea> 
                <br>City<br>
                <textarea name='city' rows='1' cols='30'>$city</textarea> 
                <br>
                <input type='submit' value='submit' name='submit'>
                <input type='submit' value='cancel' name='cancel'>
                </form>";

        if (isset($_POST['submit'])){
            $name= $_POST['name'];
            $date= $_POST['date'];
            $indie= $_POST['indie'];
            $state=$_POST['state'];
            $country=$_POST['country'];
            $city=$_POST['city'];
            $update= "UPDATE publisher
                SET Name='$name',
                Date_Created='$date',
                Indie='$indie',
                State='$state',
                Country='$country',
                City='$city'
                WHERE Publisher_ID='$pid'";
            if(mysql_query($update, $connection)){
                mysql_close($connection);
                header("location: publisher_edit.php");
            }
            else{
                die(mysql_error());
            }
        }

        if(isset($_POST['cancel'])){
            header("location: publisher_edit.php");
        }
?>