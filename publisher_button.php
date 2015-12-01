<?php
    if(isset($_POST['create'])){
        header("location:create_publisher.php");
    }
    if(isset($_POST['delete'])){
        $pid= $_POST['pid'];
        $connection = mysql_connect("localhost", "root", "");
        $db = mysql_select_db ("comics", $connection);
        $sql = "DELETE FROM publisher WHERE Publisher_ID = '$pid'";
        $result = mysql_query($sql);
    
        if ($result){
            echo "Deleted publisher with ID $pid";
        }
        else{
            die(mysql_error());
        }
    
        mysql_close($connection);

    }
    if(isset($_POST['edit'])){
        $pid=$_POST['pid'];
        header("location:publisher_edit_scr.php?pid=".urlencode("$pid"));
    }
    


?>