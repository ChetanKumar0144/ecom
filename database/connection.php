<?php
    // query for connectio to database
    $conn = mysqli_connect('localhost','root','','music'); 
    
    if($conn -> connect_errno){
        // show error if database is not connected.
        die('connecction failed due to '.$conn-> connect_error);  
    }
?>