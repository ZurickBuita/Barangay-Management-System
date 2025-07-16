<!-- Add Modal -->
<div class="modal fade" id="addUser" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addUserForm" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
             <div class="form-group d-flex flex-column">
               <img class="mx-auto" src="img/default_avatar.png" alt="User Avatar" width="200px" height="200px">
               <div>
                 <label>Image(Optional)</label>
                 <input type="file" name="avatar" class="form-control p-0 pt-1 pl-1 m-0">
               </div>
            </div>
            <div class="form-group">
              <label>Username<sup class="text-danger">*</sup></label>
              <input type="text" name="username" class="form-control" placeholder="Enter Username">
              <small class="text-danger" id="username_add_error"></small>
            </div>
            <div class="form-group">
              <label>Password<sup class="text-danger">*</sup></label>
              <input type="password" name="password" class="form-control" placeholder="Enter Password">
              <small class="text-danger" id="password_add_error"></small>
            </div>
            <div class="form-group">
              <label>Confirm Password<sup class="text-danger">*</sup></label>
              <input type="password" name="confirm_password" class="form-control" placeholder="Enter Confirm Password">
              <small class="text-danger" id="confirm_password_add_error"></small>
            </div>
             <div class="form-group">
                <label>User Type<sup class="text-danger">*</sup></label>
                <select class="form-control" name="user_type">
                  <option disabled selected>Select an option</option>
                  <option value="Staff">Staff</option>
                  <option value="Admin">Admin</option>
                </select>
                <small class="text-danger" id="user_type_add_error"></small>
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