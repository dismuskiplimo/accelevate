<div class="modal fade" id="add-group-assignment">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('staff.group-assignment.create', ['id' => $group->id]) }}" method="POST">
        @csrf
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Group Assignment</h4>
        </div>
        
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                  <label for="">Question</label>
                  <textarea name="question" id="" cols="" rows="3" required="" class="form-control"></textarea>
              </div>

              
            </div> 
          </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Post Assignment</button>
        </div>
      </form>
    </div>
  </div>
</div>