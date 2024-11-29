<?php

    include_once "../config/dbconnect.php";
    
    $p_id=$_POST['record'];
    $query="DELETE FROM players where product_id='$p_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Player Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>