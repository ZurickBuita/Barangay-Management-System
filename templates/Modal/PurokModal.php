<!-- Add Modal -->
<div class="modal fade" id="addPurok" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Purok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addPurokForm" method="POST">
        <div class="modal-body">
           <div class="form-group">
            <label>Purok<sup class="text-danger">*</sup></label>
            <input type="number" name="purok" class="form-control" placeholder="Enter Purok">
            <small class="text-danger" id="purok_add_error"></small>
          </div>
           <div class="form-group">
            <label>Details(Optional)</label>
            <input type="text" name="details" class="form-control" placeholder="Enter Details">
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
<div class="modal fade" id="editPurok" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Purok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editPurokForm" method="POST">
        <div class="modal-body">
           <input type="hidden" name="id" id="id">
           <div class="form-group">
            <label>Purok<sup class="text-danger">*</sup></label>
            <input type="number" name="purok" id="purok" class="form-control" placeholder="Enter Purok">
            <small class="text-danger" id="purok_edit_error"></small>
          </div>
           <div class="form-group">
            <label>Details(Optional)</label>
            <input type="text" name="details" id="details" class="form-control" placeholder="Enter Details">
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