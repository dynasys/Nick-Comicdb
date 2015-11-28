<?php
    if(isset($_POST['cancel'])){
        header("location:admin_home.php");
    }
    if(isset($_POST['submit'])){
        $ISBN=$_POST['isbn'];
        $Title=$_POST['title'];
        $Date=$_POST['date'];
        $Number=$_POST['number'];
        $Price=$_POST['price'];
        $Genre=$_POST['genre'];
        $Type=$_POST['select'];
        $Publisher=$_POST['publisher'];
        $Series=$_POST['series'];
        $Author=$_POST['author'];
        $Artist=$_POST['artist'];
            
        $connection = mysql_connect("localhost", "root", "");
        $db = mysql_select_db ("comics", $connection);
        $sql = "UPDATE issue
            SET title='$Title',
            issue_date='$Date',
            issue_number='$Number',
            price='$Price', 
            genre='$Genre',
            book_type='$Type',
            publisher='$Publisher',
            series='$Series',            
            author='$Author',
            artist='$Artist'
            WHERE ISBN='$ISBN'";
            
        if (mysql_query($sql,$connection)){
            header("location:admin_home.php");
        }

        else{
            die(mysql_error()); 
        }
    
        mysql_close($connection);
   
    }    
?>