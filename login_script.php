<?php
        session_start();
        
        if(isset($_POST['admin_sub'])){
            echo "ayy";
            $username=$_POST['username'];
            $password=$_POST['password'];
                
            $connection = mysql_connect("localhost","root","");
            $db = mysql_select_db("comics", $connection);
            $query = mysql_query("SELECT * FROM admin where password='$password' AND username='$username'", $connection);
            $rows = mysql_num_rows($query);
            if($rows=1){
                echo"login successful";
            }
            else{
                echo"Wrong username or password";
            }
        mysql_close($connection);        
            
        }
?>