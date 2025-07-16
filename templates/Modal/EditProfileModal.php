<?php
  include 'server/Database.php';
  $id = $_SESSION['id'];
  $query = "SELECT * FROM `users` WHERE id=$id";
  $result = $conn->query($query);

  $row = $result->fetch_assoc();
  $img = ($row['avatar'] == null) ? "img/default_avatar.png" : "storage/user_img/" . $row['avatar'];
?>
<!-- Edit Modal -->
<div class="modal fade" id="editUser" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editUserForm" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
             <input type="hidden" name="id" value="<?=$row['id']?>">
             <div class="form-group d-flex flex-column">
               <img class="mx-auto" src="<?=$img?>" alt="User Avatar" width="200px" height="200px">
               <div>
                 <label>Image(Optional)</label>
                 <input type="file" name="avatar" class="form-control p-0 pt-1 pl-1 m-0">
               </div>
            </div>
            <div class="form-group">
              <label>Username<sup class="text-danger">*</sup></label>
              <input type="text" name="username" value="<?=$row['username']?>" class="form-control" placeholder="Enter Username">
              <small class="text-danger" id="username_edit_error"></small>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter Password">
              <small class="text-danger" id="password_edit_error"></small>
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" name="confirm_password" class="form-control" placeholder="Enter Confirm Password">
            </div>
             <div class="form-group">
                <label>User Type<sup class="text-danger">*</sup></label>
                <select class="form-control" name="user_type">
                  <option disabled>Select an option</option>
                  <option <?=($row['user_type'] == 'staff') ? 'selected' : '' ?> value="staff">Staff</option>
                  <option <?=($row['user_type'] == 'admin') ? 'selected' : '' ?> value="admin">Admin</option>
                </select>
                <small class="text-danger" id="user_type_edit_error"></small>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addForm" class="btn btn-primary">Save</button>
          </div>
      </form>
    </div>
  </div>
</div>