<!-- Add Modal -->
<div class="modal fade" id="addResident" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Resident</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addResidentForm" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Image(Optional)</label>
              <input type="file" name="img" class="form-control p-0 pt-1 pl-1 m-0">
            </div>
            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>First Name<sup class="text-danger">*</sup></label>
              <input type="text" name="firstname" class="form-control" placeholder="Enter First Name">
              <small class="text-danger" id="firstname_add_error"></small>
            </div>

             <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Middle Name(Optional)</label>
              <input type="text" name="middlename" class="form-control" placeholder="Enter Middle Name">
            </div>

             <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Last Name<sup class="text-danger">*</sup></label>
              <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name">
              <small class="text-danger" id="lastname_add_error"></small>
            </div>

             <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Birthday<sup class="text-danger">*</sup></label>
              <input type="date" name="birthday" class="form-control">
              <small class="text-danger" id="birthday_add_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Age<sup class="text-danger">*</sup></label>
              <input type="number" name="age" class="form-control" placeholder="Enter Age">
              <small class="text-danger" id="age_add_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Email<sup class="text-danger">*</sup></label>
              <input type="email" name="email" class="form-control" placeholder="Enter Email">
               <small class="text-danger" id="email_add_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Address<sup class="text-danger">*</sup></label>
              <input type="text" name="address" class="form-control" placeholder="Enter Address">
              <small class="text-danger" id="address_add_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>National ID<sup class="text-danger">*</sup></label>
              <input type="text" name="national_id" class="form-control" placeholder="Enter National ID">
              <small class="text-danger" id="national_id_add_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Citizenship<sup class="text-danger">*</sup></label>
              <input type="text" name="citizenship" class="form-control" placeholder="Enter Citizenship">
              <small class="text-danger" id="citizenship_add_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Occupation<sup class="text-danger">*</sup></label>
              <input type="text" name="occupation" class="form-control" placeholder="Enter Occupation">
              <small class="text-danger" id="occupation_add_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Salary<sup class="text-danger">*</sup></label>
              <input type="text" name="salary" class="form-control" placeholder="Enter Salary">
              <small class="text-danger" id="salary_add_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Sex<sup class="text-danger">*</sup></label>
              <select class="form-control" name="sex">
                <option disabled selected>Select an option</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              <small class="text-danger" id="sex_add_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Civil Status<sup class="text-danger">*</sup></label>
              <select class="form-control" name="civilstatus">
                <option disabled selected>Select an option</option>
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="Widow">Widow</option>
              </select>
              <small class="text-danger" id="civilstatus_add_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Indigenous<sup class="text-danger">*</sup></label>
              <select class="form-control" name="is_indigenous">
                <option disabled selected>Select an option</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
              <small class="text-danger" id="is_indigenous_add_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Decease<sup class="text-danger">*</sup></label>
              <select class="form-control" name="is_deceased">
                <option disabled selected>Select an option</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
              <small class="text-danger" id="is_deceased_add_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Voter<sup class="text-danger">*</sup></label>
              <select class="form-control" name="is_voter">
                <option disabled selected>Select an option</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
              <small class="text-danger" id="is_voter_add_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Purok<sup class="text-danger">*</sup></label>
              <select class="form-control" name="purok_id">
                <option disabled selected>Select an option</option>
                <?php if(!empty($purok)): ?>
                  <?php foreach ($purok as $row): ?>
                     <option value="<?=$row['id']?>"><?=$row['name']?></option>
                  <?php endforeach ?>
                <?php endif ?>
              </select>
              <small class="text-danger" id="purok_id_add_error"></small>
            </div>

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

<!-- Add Modal -->
<div class="modal fade" id="editResident" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Resident</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editResidentForm" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <input type=hidden name="id" id="id">
            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Image(Optional)</label>
              <input type="file" name="img" img="img" class="form-control p-0 pt-1 pl-1 m-0">
            </div>
            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>First Name<sup class="text-danger">*</sup></label>
              <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter First Name">
              <small class="text-danger" id="firstname_edit_error"></small>
            </div>

             <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Middle Name<sup class="text-danger">*</sup></label>
              <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Enter Middle Name">
            </div>

             <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Last Name<sup class="text-danger">*</sup></label>
              <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Last Name">
              <small class="text-danger" id="lastname_edit_error"></small>
            </div>

             <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Birthday<sup class="text-danger">*</sup></label>
              <input type="date" name="birthday" id="birthday" class="form-control">
              <small class="text-danger" id="birthday_edit_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Age<sup class="text-danger">*</sup></label>
              <input type="number" name="age" id="age" class="form-control" placeholder="Enter Age">
              <small class="text-danger" id="age_edit_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Email<sup class="text-danger">*</sup></label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
               <small class="text-danger" id="email_edit_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Address<sup class="text-danger">*</sup></label>
              <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
              <small class="text-danger" id="address_edit_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>National ID<sup class="text-danger">*</sup></label>
              <input type="text" name="national_id" id="national_id" class="form-control" placeholder="Enter National ID">
              <small class="text-danger" id="national_id_edit_error"></small>
            </div>

             <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Citizenship<sup class="text-danger">*</sup></label>
              <input type="text" name="citizenship" id="citizenship" class="form-control" placeholder="Enter Citizenship">
              <small class="text-danger" id="citizenship_edit_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Occupation<sup class="text-danger">*</sup></label>
              <input type="text" name="occupation" id="occupation" class="form-control" placeholder="Enter Occupation">
              <small class="text-danger" id="occupation_edit_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Salary<sup class="text-danger">*</sup></label>
              <input type="text" name="salary" id="salary" class="form-control" placeholder="Enter Salary">
              <small class="text-danger" id="salary_edit_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Sex<sup class="text-danger">*</sup></label>
              <select class="form-control" name="sex" id="sex">
                <option disabled>Select an option</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              <small class="text-danger" id="sex_edit_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Civil Status<sup class="text-danger">*</sup></label>
              <select class="form-control" name="civilstatus" id="civilstatus">
                <option disabled>Select an option</option>
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="widow">Widow</option>
              </select>
              <small class="text-danger" id="civilstatus_edit_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Indigenous<sup class="text-danger">*</sup></label>
              <select class="form-control" name="is_indigenous" id="is_indigenous">
                <option disabled>Select an option</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
              <small class="text-danger" id="is_indigenous_edit_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Decease<sup class="text-danger">*</sup></label>
              <select class="form-control" name="is_deceased" id="is_deceased">
                <option disabled>Select an option</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
              <small class="text-danger" id="is_deceased_edit_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Voter<sup class="text-danger">*</sup></label>
              <select class="form-control" name="is_voter" id="is_voter">
                <option disabled>Select an option</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
              <small class="text-danger" id="is_voter_edit_error"></small>
            </div>

            <div class="form-group col-lg-3 col-md-6 col-sm-12">
              <label>Purok<sup class="text-danger">*</sup></label>
              <select class="form-control" name="purok_id" id="purok_id">
                <option disabled>Select an option</option>
                <?php if(!empty($purok)): ?>
                  <?php foreach ($purok as $row): ?>
                     <option value="<?=$row['id']?>"><?=$row['name']?></option>
                  <?php endforeach ?>
                <?php endif ?>
              </select>
              <small class="text-danger" id="purok_id_edit_error"></small>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="editForm" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>