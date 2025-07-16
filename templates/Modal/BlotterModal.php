<!-- Add Modal -->
<div class="modal fade" id="addBlotter" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Blotter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addBlotterForm" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Complainant<sup class="text-danger">*</sup></label>
            <input type="text" name="complainant" class="form-control" placeholder="Enter Complainant">
            <small class="text-danger" id="complainant_add_error"></small>          
          </div>
          <div class="form-group">
            <label>Respondent<sup class="text-danger">*</sup></label>
            <input type="text" name="respondent" class="form-control" placeholder="Enter Respondent">
            <small class="text-danger" id="respondent_add_error"></small>
          </div>
          <div class="form-group">
            <label>Victim<sup class="text-danger">*</sup></label>
            <input type="text" name="victim" class="form-control" placeholder="Enter Victim">
            <small class="text-danger" id="victim_add_error"></small>
          </div>
          <div class="form-group">
            <label>Blotter/Incident<sup class="text-danger">*</sup></label>
            <textarea class="form-control" name="type"></textarea>
            <small class="text-danger" id="type_add_error"></small>
          </div>
           <div class="form-group">
            <label>Details<sup class="text-danger">*</sup></label>
            <textarea class="form-control" name="details"></textarea>
            <small class="text-danger" id="details_add_error"></small>
          </div>
          <div class="form-group">
            <label>Location<sup class="text-danger">*</sup></label>
            <input type="text" name="location" class="form-control" placeholder="Enter Location">
            <small class="text-danger" id="location_add_error"></small>
          </div>
          <div class="form-group">
            <label>Date<sup class="text-danger">*</sup></label>
            <input type="date" name="date" class="form-control" placeholder="Enter Date">
            <small class="text-danger" id="date_add_error"></small>
          </div>
          <div class="form-group">
            <label>Time<sup class="text-danger">*</sup></label>
            <input type="time" name="time" class="form-control">
            <small class="text-danger" id="time_add_error"></small>
          </div>
          <div class="form-group">
            <label>Status<sup class="text-danger">*</sup></label>
            <select class="form-control" name="status">
              <option disabled selected>Select an option</option>
              <option value="Active">Active</option>
              <option value="Settled">Settled</option>
              <option value="Scheduled">Scheduled</option>
            </select>
             <small class="text-danger" id="status_add_error"></small>
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

<!-- Edit Modal -->
<div class="modal fade" id="editBlotter" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Blotter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editBlotterForm" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label>Complainant<sup class="text-danger">*</sup></label>
            <input type="text" name="complainant" id="complainant" class="form-control" placeholder="Enter Complainant">
            <small class="text-danger" id="complainant_edit_error"></small>          
          </div>
          <div class="form-group">
            <label>Respondent<sup class="text-danger">*</sup></label>
            <input type="text" name="respondent" id="respondent" class="form-control" placeholder="Enter Respondent">
            <small class="text-danger" id="respondent_edit_error"></small>
          </div>
          <div class="form-group">
            <label>Victim<sup class="text-danger">*</sup></label>
            <input type="text" name="victim" id="victim" class="form-control" placeholder="Enter Victim">
            <small class="text-danger" id="victim_edit_error"></small>
          </div>
          <div class="form-group">
            <label>Blotter/Incident<sup class="text-danger">*</sup></label>
            <textarea class="form-control" name="type" id="type"></textarea>
            <small class="text-danger" id="type_edit_error"></small>
          </div>
           <div class="form-group">
            <label>Details<sup class="text-danger">*</sup></label>
            <textarea class="form-control" name="details" id="details"></textarea>
            <small class="text-danger" id="details_edit_error"></small>
          </div>
          <div class="form-group">
            <label>Location<sup class="text-danger">*</sup></label>
            <input type="text" name="location" id="location" class="form-control" placeholder="Enter Location">
             <small class="text-danger" id="location_edit_error"></small>
          </div>
          <div class="form-group">
            <label>Date<sup class="text-danger">*</sup></label>
            <input type="date" name="date" id="date" class="form-control">
            <small class="text-danger" id="date_edit_error"></small>
          </div>
          <div class="form-group">
            <label>Time<sup class="text-danger">*</sup></label>
            <input type="time" name="time" id="time" class="form-control">
            <small class="text-danger" id="time_edit_error"></small>
          </div>
          <div class="form-group">
            <label>Status<sup class="text-danger">*</sup></label>
            <select class="form-control" name="status" id="status">
              <option disabled selected>Select an option</option>
              <option value="Active">Active</option>
              <option value="Settled">Settled</option>
              <option value="Scheduled">Scheduled</option>
            </select>
             <small class="text-danger" id="status_edit_error"></small>
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