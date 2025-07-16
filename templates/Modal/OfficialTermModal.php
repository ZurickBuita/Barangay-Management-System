<!-- Add Modal -->
<div class="modal fade" id="addTerm" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Official Term</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addOfficialTermForm" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Start Term<sup class="text-danger">*</sup></label>
            <input type="date" name="start_term" class="form-control">
            <small class="text-danger" id="start_term_add_error"></small>
          </div>
          <div class="form-group">
            <label>End Term<sup class="text-danger">*</sup></label>
            <input type="date" name="end_term" class="form-control">
            <small class="text-danger" id="end_term_add_error"></small>
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
<div class="modal fade" id="editTerm" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Official Term</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editOfficialTermForm" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
         <div class="form-group">
            <label>Start Term<sup class="text-danger">*</sup></label>
            <input type="date" name="start_term" id="start_term" class="form-control">
            <small class="text-danger" id="start_term_edit_error"></small>
          </div>
          <div class="form-group">
            <label>End Term<sup class="text-danger">*</sup></label>
            <input type="date" name="end_term"  id="end_term" class="form-control">
            <small class="text-danger" id="end_term_edit_error"></small>
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