
<div class="container p-5">

<h4>Edit Product Detail</h4>
<?php

    include_once "../config/dbconnect.php";
	$ID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * FROM players WHERE product_id='$ID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
      $catID=$row1["team_id"];
?>
<form id="update-Items" enctype='multipart/form-data' action="./controller/updateItemController.php" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" id="product_id" name="product_id" value="<?=$row1['product_id']?>" hidden>
            </div>
            <div class="form-group">
              <label for="name">Player Name:</label>
              <input type="text" class="form-control" id="p_name" name="p_name" value="<?=$row1['player_name']?>">
            </div>
            <div class="form-group">
              <label for="name">Player Position:</label>
              <input type="text" class="form-control" id="p_position" name="p_position" value="<?=$row1['player_position']?>">
            </div>
            <div class="form-group">
              <label for="name">Player Height:</label>
              <input type="text" class="form-control" id="p_height" name="p_height" value="<?=$row1['player_height']?>">
            </div>
            <div class="form-group">
              <label for="name">Player Weight:</label>
              <input type="text" class="form-control" id="p_weight" name="p_weight" value="<?=$row1['player_weight']?>">
            </div>
            <div class="form-group">
              <label for="name">Player Current Team:</label>
              <input type="text" class="form-control" id="c_team" name="c_team" value="<?=$row1['current_team']?>">
            </div>
            <div class="form-group">
              <label for="name">Player Past Team:</label>
              <input type="text" class="form-control" id="p_team" name="p_team" value="<?=$row1['past_team']?>">
            </div>
            <div class="form-group">
              <label for="price">Player Total Points:</label>
              <input type="number" class="form-control" id="p_tpoint" name="p_tpoint" value="<?=$row1['total_point']?>">
            </div>
            <div class="form-group">
              <label for="price">Player Assists:</label>
              <input type="number" class="form-control" id="p_assist" name="p_assist" value="<?=$row1['player_assist']?>">
            </div>
            <div class="form-group">
              <label for="price">Player STL:</label>
              <input type="number" class="form-control" id="p_stl" name="p_stl" value="<?=$row1['player_stl']?>">
            </div>
            <div class="form-group">
              <label for="price">Player BLK:</label>
              <input type="number" class="form-control" id="p_bkl" name="p_bkl" value="<?=$row1['player_blk']?>">
            </div>
    <div class="form-group">
      <label>Team:</label>
      <select id="category" name="category">
        <?php
          $sql="SELECT * from teams WHERE category_id='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['category_id'] ."'>" .$row['team_name'] ."</option>";
            }
          }
        ?>
        <?php
          $sql="SELECT * from teams WHERE category_id!='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['category_id'] ."'>" .$row['team_name'] ."</option>";
            }
          }
        ?>
      </select>
    </div>
      <div class="form-group">
         <img width='200px' height='150px' src='<?=$row1["player_image"]?>'>
         <div>
            <label for="file">Choose Image:</label>
            <input type="text" id="existingImage" name="existingImage" class="form-control" value="<?=$row1['player_image']?>" hidden>
            <input type="file" id="newImage" name="newImage" value="">
         </div>
    </div>
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary">Update Item</button>
    </div>
    <?php
    		}
    	}
    ?>
  </form>

    </div>