<!-- Add Modal -->
<div class="modal fade" id="addPosition" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Position</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addPositionForm" method="POST">
        <div class="modal-body">
           <div class="form-group">
            <label>Order No.<sup class="text-danger">*</sup></label>
            <input type="number" name="order" class="form-control" placeholder="Enter Order">
            <small class="text-danger" id="order_add_error"></small>
          </div>
           <div class="form-group">
            <label>Position<sup class="text-danger">*</sup></label>
            <input type="text" name="position" class="form-control" placeholder="Enter Position">
            <small class="text-danger" id="position_add_error"></small>
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
<div class="modal fade" id="editPosition" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Position</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editPositionForm" method="POST">
        <div class="modal-body">
           <input type="hidden" name="id" id="id">
           <div class="form-group">
            <label>Order No.<sup class="text-danger">*</sup></label>
            <input type="number" name="order" id="order" class="form-control" placeholder="Enter Order">
            <small class="text-danger" id="order_edit_error"></small>
          </div>
           <div class="form-group">
            <label>Position<sup class="text-danger">*</sup></label>
            <input type="text" name="position" id="position" class="form-control" placeholder="Enter Position">
            <small class="text-danger" id="position_edit_error"></small>
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