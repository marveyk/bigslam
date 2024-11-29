<?php
    include_once "../config/dbconnect.php";
    // Echo all the values being used for the update query

    $product_id = $_POST['product_id'];  // Assuming 'product_id' represents the player ID in your system
    $p_name = $_POST['p_name'];  // Player Name
    $p_position = $_POST['p_position'];  // Player Position
    $p_height = $_POST['p_height'];  // Player Height
    $p_weight = $_POST['p_weight'];  // Player Weight
    $c_team = $_POST['c_team'];  // Current Team
    $p_team = $_POST['p_team'];  // Past Team
    $p_tpoint = $_POST['p_tpoint'];  // Total Points
    $p_assist = $_POST['p_assist'];  // Player Assists
    $p_stl = $_POST['p_stl'];  // Player Steals (STL)
    $p_bkl = $_POST['p_bkl'];  // Player Blocks (BLK)
    $category = $_POST['category'];  // Team (category_id from the dropdown)

    if( isset($_FILES['newImage']) ){
        
        $location="./uploads/";
        $img = $_FILES['newImage']['name'];
        $tmp = $_FILES['newImage']['tmp_name'];
        $dir = '../uploads/';
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif','webp');
        $image =rand(1000,1000000).".".$ext;
        $final_image=$location.$img;
        if (in_array($ext, $valid_extensions)) {
            $path = UPLOAD_PATH . $image;
            move_uploaded_file($tmp, $dir.$image);
        }
    }else{
        $final_image=$_POST['existingImage'];
    }
    // Echo all the values being used for the update query
    $updateItem = mysqli_query($conn,"UPDATE players SET 
        player_name='$p_name', 
        player_position='$p_position', 
        player_height='$p_height', 
        player_weight='$p_weight', 
        team_id='$category',  -- Updated from category_id to team_id
        current_team='$c_team', 
        past_team='$p_team', 
        total_point='$p_tpoint', 
        player_assist='$p_assist', 
        player_stl='$p_stl', 
        player_blk='$p_bkl', 
        player_image='$final_image' 
        WHERE product_id=$product_id");


    if($updateItem)
    {
        echo "true";
    }
    // else
    // {
    //     echo mysqli_error($conn);
    // }
?>