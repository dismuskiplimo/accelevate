<div class="modal fade" id="add-group">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('staff.group.create') }}" method="POST">
        @csrf
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Group</h4>
        </div>
        
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="skill-1">Group Name</label>
                <input type = "text" name="name" id="skill-1" required="" class="form-control" />
              </div>
            </div>   
          </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Group</button>
        </div>
      </form>
    </div>
  </div>
</div>