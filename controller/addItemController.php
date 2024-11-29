<?php
    include_once "../config/dbconnect.php";

    if(isset($_POST['uploaditem']))
    {

        $PlayerName = $_POST['p_name'];
        $PlayerPosition= $_POST['p_position'];
        $PlayerHeight = $_POST['p_height'];
        $PlayerWeight = $_POST['p_weight'];
        $CurrentTeam = $_POST['c_team'];
        $PastTeam= $_POST['p_team'];
        $PlayerTotalPoint = $_POST['p_tpoint'];
        $PlayerAssist = $_POST['p_assist'];
        $PlayerSTL = $_POST['p_stl'];
        $PlayerBLK= $_POST['p_bkl'];
        $PlayerTeam= $_POST['playerteam'];

       
            
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="./uploads/";
        $image=$location.$name;

        $target_dir="../uploads/";
        $finalImage=$target_dir.$name;

        move_uploaded_file($temp,$finalImage);

         $insert = mysqli_query($conn,"INSERT INTO players
         (player_name,player_position,player_height,player_weight,team_id,current_team,past_team,total_point,player_assist,player_stl,player_blk,player_image) 
         VALUES ('$PlayerName','$PlayerPosition',$PlayerHeight,'$PlayerWeight','$PlayerTeam','$CurrentTeam','$PastTeam','$PlayerTotalPoint','$PlayerAssist','$PlayerSTL','$PlayerBLK','$image')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {
             echo "Records added successfully.";
         }
     
    }
        
?>