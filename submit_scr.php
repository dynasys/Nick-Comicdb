<?php
    if(isset($_POST['submit'])){
        $ISBN=$_POST['isbn'];
        $Title=$_POST['title'];
        $Number=$_POST['issue_no'];
        $Series=$_POST['series'];
        $Author=$_POST['author'];
        $Artist=$_POST['artist'];
        $Date=$_POST['date'];
        $Publisher=$_POST['publisher'];
        $Genre=$_POST['genre'];
        $Price=$_POST['price'];
        $Type=$_POST['radio'];
        
        $connection = mysql_connect("localhost", "root", "");
        $db = mysql_select_db ("comics", $connection);
        $query = mysql_query("SELECT * FROM issue WHERE 
        isbn='$ISBN'", $connection);
        $rows = mysql_num_rows($query);
        
        if($rows==1){
            echo "<b>Error: An issue with that ISBN already exists.</b>";
        }
        else{
            $sql = "INSERT INTO issue(ISBN, title, issue_date,
            issue_number, price, genre, book_type, publisher,
            series, author, artist) VALUES ('$ISBN', '$Title',
            '$Date', '$Number', '$Price', '$Genre', '$Type', 
            '$Publisher', '$Series', '$Author', '$Artist')";
            
            $insert = mysql_query($sql, $connection);

            if(! $insert){
                die ('Could not insert data' . mysql_error());
            }
            
            echo "Issue insert successful!";
            
            mysql_close($connection);
        }   
    }
    
    
    
?>