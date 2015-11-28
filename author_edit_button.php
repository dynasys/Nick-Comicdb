<?php
    if(isset($_POST['add_author'])){
        header("location:create_author.php");
    }
    
    if(isset($_POST['delete'])){
        $aid= $_POST['aid'];
        $connection = mysql_connect("localhost", "root", "");
        $db = mysql_select_db ("comics", $connection);
        $sql = "DELETE FROM author WHERE Author_ID = '$aid'";
        $result = mysql_query($sql);
    
        if ($result){
            echo "Deleted author with ID $aid";
        }
        else{
            die(mysql_error());
        }
    
        mysql_close($connection);
    }

    if(isset($_POST['edit'])){
        header("location: author_edit_scr.php?aid=".urlencode("$aid"));
    }


?>