<?php    
    if(isset($_POST['delete'])){       
        $ISBN = $_POST['isbn'];
        $connection = mysql_connect("localhost", "root", "");
        $db = mysql_select_db ("comics", $connection);
        $sql = "DELETE FROM issue WHERE ISBN = '$ISBN'";
        $result = mysql_query($sql);
    
        if ($result){
            echo "Deleted record with ISBN $ISBN";
        }
        else{
            die(mysql_error());
        }
    
        mysql_close($connection);
    }    
    if(isset($_POST['edit'])){
        $ISBN = $_POST['isbn'];
        header ("location:series_edit.php?ISBN=".urlencode("$ISBN"));
        
    }
?>