<?php 
if(isset($message)){
  echo $message;
}

?>
<h2>Edit Profile</h2>
<form id="primaryForm">
  <div class="grid-container column-2">
    <div>
      <div class="form-group">
        <label for="admin_name">Admin Name</label>
        <input type="hidden" name="admin_id" value="<?php echo $admin_detail->admin_id ?>">
        <input type="text" class="form-control" value="<?php echo $admin_detail->admin_name ?>" name="admin_name">
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" value="<?php echo $admin_detail->username ?>" name="username">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input id="password" type="password" class="form-control" name="password">
        <small>leave emty if no change</small>
      </div>
      <div class="form-group">
        <label for="pwd">Password Confirmation:</label>
        <input id="passconf" type="password" onkeyup="passCheck()" class="form-control" name="passconf">
        <small id="warning"></small>
      </div>
    </div>
    <div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" value="<?php echo $admin_detail->email ?>" name="email">
      </div>
      <div class="form-group">
        <label for="division">Division</label>
        <select class="form-control" name="division">
          <?php 
          foreach ($division_list as $item) {
            if ($item->division_id == $admin_detail->division_id) {
              echo "<option value='$item->division_id' selected >$item->div_name</option>";
            } else {
              echo "<option value='$item->division_id'>$item->div_name </option>";
            }
          }

          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="admin_level">Select list:</label>
        <select class="form-control" name="admin_level">
          <?php 
          foreach ($level_list as $level) {
            if ($level->level_admin_id == $admin_detail->level_admin_id) {
              echo "<option value='$level->level_admin_id' selected >$level->level_name</option>";
            } else {
              echo "<option value='$level->level_admin_id'>$level->level_name </option>";
            }
          }

          ?>
        </select>
      </div>
    </div>
  </div>
  <div  id="submitButton" class="btn good" onclick="xSubmitForm('primaryForm','process_admin_edit')">Submit</div>
</form>
<script>
 
</script>