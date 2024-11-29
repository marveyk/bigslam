<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $teamname = $_POST['t_name'];
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="./uploads/";
        $image=$location.$name;

        $target_dir="../uploads/";
        $finalImage=$target_dir.$name;
       
         $insert = mysqli_query($conn,"INSERT INTO teams
         (team_name,teamlogo) 
         VALUES ('$teamname','$image')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../dashboard.php?teams=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../dashboard.php?teams=success");
         }
     
    }
        
?>