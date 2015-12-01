<?php
	//echo "artist_edit_button ran";
    if(isset($_POST['add_artist'])){
		//echo "add_artist ran";
        header("location:create_artist.php");
    }
    
    if(isset($_POST['delete'])){
        $aid= $_POST['aid'];
        $connection = mysql_connect("localhost", "root", "");
        $db = mysql_select_db ("comics", $connection);
        $sql = "DELETE FROM artist WHERE Artist_ID = '$aid'";
        $result = mysql_query($sql);
    
        if ($result){
            echo "Deleted artist with ID $aid";
        }
        else{
            die(mysql_error());
        }
    
        mysql_close($connection);
		
		header("location:artist_edit.php");
    }

    if(isset($_POST['edit'])){
        header("location: artist_edit_scr.php?aid=".urlencode("$aid"));
    }


?>