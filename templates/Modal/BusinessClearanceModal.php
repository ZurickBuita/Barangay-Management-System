<!-- Add Modal -->
<div class="modal fade" id="addBusinessClearance" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Business Clearance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addBusinessClearanceForm" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Business Name<sup class="text-danger">*</sup></label>
            <input type="text" name="business_name" class="form-control" placeholder="Enter Business Name">
            <small class="text-danger" id="business_name_add_error"></small>
          </div>
          <div class="form-group">
            <label>Business Owner<sup class="text-danger">*</sup></label>
            <input type="text" name="business_owner" class="form-control" placeholder="Enter Business Owner">
            <small class="text-danger" id="business_owner_add_error"></small>
          </div>
          <div class="form-group">
            <label>Business Nature<sup class="text-danger">*</sup></label>
            <input type="text" name="business_nature" class="form-control" placeholder="e.g. Sari-sari store/Water Refill Station">
            <small class="text-danger" id="business_nature_add_error"></small>
          </div>
          <div class="form-group">
            <label>Date applied<sup class="text-danger">*</sup></label>
            <input type="date" name="date_applied" class="form-control">
            <small class="text-danger" id="date_applied_add_error"></small>
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
<div class="modal fade" id="editBusinessClearance" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Business Clearance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editBusinessClearanceForm" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label>Business Name<sup class="text-danger">*</sup></label>
            <input type="text" name="business_name" id="business_name" class="form-control" placeholder="Enter Business Name">
            <small class="text-danger" id="business_name_edit_error"></small>
          </div>
          <div class="form-group">
            <label>Business Owner<sup class="text-danger">*</sup></label>
            <input type="text" name="business_owner" id="business_owner" class="form-control" placeholder="Enter Business Owner">
            <small class="text-danger" id="business_owner_edit_error"></small>
          </div>
          <div class="form-group">
            <label>Business Nature<sup class="text-danger">*</sup></label>
            <input type="text" name="business_nature" id="business_nature" class="form-control" placeholder="e.g. Sari-sari store/Water Refill Station">
            <small class="text-danger" id="business_nature_edit_error"></small>
          </div>
          <div class="form-group">
            <label>Date applied<sup class="text-danger">*</sup></label>
            <input type="date" name="date_applied"  id="date_applied" class="form-control">
            <small class="text-danger" id="date_applied_edit_error"></small>
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