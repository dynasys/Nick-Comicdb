<?php
    if(isset($_POST['create'])){
        header("location:create_series.php");
    }
    if(isset($_POST['delete'])){
        $sid= $_POST['sid'];
        $connection = mysql_connect("localhost", "root", "");
        $db = mysql_select_db ("comics", $connection);
        $sql = "DELETE FROM series WHERE Series_ID = '$sid'";
        $result = mysql_query($sql);
    
        if ($result){
            echo "Deleted series with ID $sid";
        }
        else{
            die(mysql_error());
        }
    
        mysql_close($connection);

    }
    if(isset($_POST['edit'])){
        $sid=$_POST['sid'];
        header("location:series_edit_scr.php?sid=".urlencode("$sid"));
    }


?>