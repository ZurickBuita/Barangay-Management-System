<!-- Add Modal -->
<div class="modal fade" id="addChairmanship" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Chairmanship</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addChairmanshipForm" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Chairmanship<sup class="text-danger">*</sup></label>
            <input type="text" name="title" class="form-control" placeholder="Enter Chairmanship">
            <small class="text-danger" id="title_add_error"></small>
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
<div class="modal fade" id="editChairmanship" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Chairmanship</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editChairmanshipForm" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label>Chairmanship<sup class="text-danger">*</sup></label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Chairmanship">
             <small class="text-danger" id="title_edit_error"></small>
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