<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/profile" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="fullname">Fullname</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" required autofocus>
            </div>
            <div class="form-group">
                <select class="form-control" name="gender" required>
                    <option value="">-</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Phone">Phone</label>
                <input type="number" class="form-control" id="Phone" name="no_telp" placeholder="Phone" required>
            </div>
            <div class="form-group">
                <label for="Sallary">Expected Sallary</label>
                <input type="number" class="form-control" id="Sallary" name="expected_sallary" placeholder="Expected Sallary" required>
            </div>
            <div class="form-group">                
                <label for="Address">Address</label>
                <textarea class="form-control" id="Address" name="address" rows="3"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>      
      </form>
    </div>
  </div>
</div>