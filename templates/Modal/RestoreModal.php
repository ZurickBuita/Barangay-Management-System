<!-- Restore Modal -->
<div class="modal fade" id="restore" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Restore Database</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="model/RestoreModel.php" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="size" value="1000000">
            <div class="form-group">
              <label>Upload Sql file<sup class="text-danger">*</sup></label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" accept=".sql" name="backup_file" required>
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Restore</button>
          </div>
      </form>
    </div>
  </div>
</div>