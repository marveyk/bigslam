
<div >
  <h2>Product Items</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Player Image</th>
        <th class="text-center">Player Name</th>
        <th class="text-center">Player Position</th>
        <th class="text-center">Current Team</th>
        <th class="text-center">Past Team</th>
        <th class="text-center">Total Point</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from players, teams WHERE players.team_id=teams.category_id";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><img height='100px' src='<?=$row["player_image"]?>'></td>
      <td><?=$row["player_name"]?></td>
      <td><?=$row["player_position"]?></td>
      <td><?=$row["current_team"]?></td>      
      <td><?=$row["past_team"]?></td> 
      <td><?=$row["total_point"]?></td>     
      <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?=$row['product_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?=$row['product_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Player
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Player</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addItemController.php" method="POST">
            <div class="form-group">
              <label for="name">Player Name:</label>
              <input type="text" class="form-control" id="p_name" name="p_name" required>
            </div>
            <div class="form-group">
              <label for="name">Player Position:</label>
              <input type="text" class="form-control" id="p_position" name="p_position" required>
            </div>
            <div class="form-group">
              <label for="name">Player Height:</label>
              <input type="text" class="form-control" id="p_height" name="p_height" required>
            </div>
            <div class="form-group">
              <label for="name">Player Weight:</label>
              <input type="text" class="form-control" id="p_weight" name="p_weight" required>
            </div>
            <div class="form-group">
              <label for="name">Player Current Team:</label>
              <input type="text" class="form-control" id="c_team" name="c_team" required>
            </div>
            <div class="form-group">
              <label for="name">Player Past Team:</label>
              <input type="text" class="form-control" id="p_team" name="p_team" required>
            </div>
            <div class="form-group">
              <label for="price">Player Total Points:</label>
              <input type="number" class="form-control" id="p_tpoint" name="p_tpoint" required>
            </div>
            <div class="form-group">
              <label for="price">Player Assists:</label>
              <input type="number" class="form-control" id="p_assist" name="p_assist" required>
            </div>
            <div class="form-group">
              <label for="price">Player STL:</label>
              <input type="number" class="form-control" id="p_stl" name="p_stl" required>
            </div>
            <div class="form-group">
              <label for="price">Player BLK:</label>
              <input type="number" class="form-control" id="p_bkl" name="p_bkl" required>
            </div>
            <div class="form-group">
              <label>Category:</label>
              <select id="category" name="playerteam" >
                <option disabled selected>Select Team</option>
                <?php

                  $sql="SELECT * from teams";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['category_id']."'>".$row['team_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" name="uploaditem" style="height:40px">Add Item</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
   