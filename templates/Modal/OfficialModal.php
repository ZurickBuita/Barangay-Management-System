<!-- Add Modal -->
<div class="modal fade" id="addOfficial" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Barangay Official</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addOfficialForm" method="POST">
        <div class="modal-body">
          <div class="form-group">
              <label>Resident<sup class="text-danger">*</sup></label>
              <select class="form-control" name="residents_id">
                <option disabled selected>Select an option</option>
                <?php if(!empty($residents)): ?>
                  <?php foreach ($residents as $row): ?>
                     <option value="<?=$row['id']?>"><?= ucwords($row['lastname'].', '.$row['firstname'].' '.$row['middlename']) ?></option>
                  <?php endforeach ?>
                <?php endif ?>
              </select>
              <small class="text-danger" id="residents_id_add_error"></small>
          </div>
          <div class="form-group">
              <label>Position<sup class="text-danger">*</sup></label>
              <select class="form-control" name="position_id">
                <option disabled selected>Select an option</option>
                 <?php if(!empty($position)): ?>
                  <?php foreach($position as $row): ?>
                    <option value="<?=$row['id']?>"><?=$row['position']?></option>
                  <?php endforeach ?>
                <?php endif?>
              </select>
              <small class="text-danger" id="position_id_add_error"></small>
          </div>
          <div class="form-group">
              <label>Chairmanship<sup class="text-danger">*</sup></label>
              <select class="form-control" name="chairmanship_id">
                <option disabled selected>Select an option</option>
                <?php if(!empty($chairmanship)): ?>
                  <?php foreach($chairmanship as $row): ?>
                    <option value="<?=$row['id']?>"><?=$row['title']?></option>
                  <?php endforeach ?>
                <?php endif?>
              </select>
              <small class="text-danger" id="chairmanship_id_add_error"></small>
          </div>
          <div class="form-group">
              <label>Term<sup class="text-danger">*</sup></label>
              <select class="form-control" name="term_id">
                <option disabled selected>Select an option</option>
                <?php if(!empty($term)): ?>
                  <?php foreach($term as $row): ?>
                    <option value="<?=$row['id']?>"><?=date("M Y", strtotime($row['start_term'])) . '-' . date("M Y", strtotime($row['end_term']))?></option>
                  <?php endforeach ?>
                <?php endif?>
              </select>
              <small class="text-danger" id="term_id_add_error"></small>
          </div>
          <div class="form-group">
              <label>Status<sup class="text-danger">*</sup></label>
              <select class="form-control" name="status">
                <option value="Active" selected>Active</option>
                <option value="Inactive">Inactive</option>
              </select>
              <small class="text-danger" id="status_add_error"></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="sumbit" name="addForm" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editOfficial" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Barangay Official</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form id="editOfficialForm" method="POST" action="">
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
              <label>Resident<sup class="text-danger">*</sup></label>
              <select class="form-control" name="residents_id" id="residents_id">
                <option disabled>Select an option</option>
                <?php if(!empty($residents)): ?>
                  <?php foreach ($residents as $row): ?>
                     <option value="<?=$row['id']?>"><?= ucwords($row['lastname'].', '.$row['firstname'].' '.$row['middlename']) ?></option>
                  <?php endforeach ?>
                <?php endif ?>
              </select>
              <small class="text-danger" id="residents_id_edit_error"></small>
          </div>
          <div class="form-group">
              <label>Position<sup class="text-danger">*</sup></label>
              <select class="form-control" name="position_id" id="position_id">
                <option disabled selected>Select an option</option>
                 <?php if(!empty($position)): ?>
                  <?php foreach($position as $row): ?>
                    <option value="<?=$row['id']?>"><?=$row['position']?></option>
                  <?php endforeach ?>
                <?php endif?>
              </select>
              <small class="text-danger" id="position_id_edit_error"></small>
          </div>
          <div class="form-group">
              <label>Chairmanship<sup class="text-danger">*</sup></label>
              <select class="form-control" name="chairmanship_id" id="chairmanship_id">
                <option disabled>Select an option</option>
                <?php if(!empty($chairmanship)): ?>
                  <?php foreach($chairmanship as $row): ?>
                    <option value="<?=$row['id']?>"><?=$row['title']?></option>
                  <?php endforeach ?>
                <?php endif?>
              </select>
              <small class="text-danger" id="chairmanship_id_edit_error"></small>
          </div>
          <div class="form-group">
              <label>Term<sup class="text-danger">*</sup></label>
              <select class="form-control" name="term_id" id="term_id">
                <option disabled>Select an option</option>
                <?php if(!empty($term)): ?>
                  <?php foreach($term as $row): ?>
                    <option value="<?=$row['id']?>"><?=date("M Y", strtotime($row['start_term'])) . '-' . date("M Y", strtotime($row['end_term']))?></option>
                  <?php endforeach ?>
                <?php endif?>
              </select>
              <small class="text-danger" id="term_id_edit_error"></small>
          </div>
          <div class="form-group">
              <label>Status<sup class="text-danger">*</sup></label>
              <select class="form-control" name="status" id="status">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
              <small class="text-danger" id="status_edit_error"></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="sumbit" name="editForm" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>