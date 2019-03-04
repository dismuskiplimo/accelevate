<div class="modal fade" id="add-event">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('admin.event.create') }}" method="POST" enctype = "multipart/form-data">
        @csrf
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Event</h4>
        </div>
        
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="skill-1">Event Name</label>
                <input type = "text" name="name" id="skill-1" required="" class="form-control" />
              </div>
            </div>   
          </div>

          <div class="row">
            
            <div class="col-sm-6">
              <div class="form-group">
                <label for="skill-2">Location</label>
                <input type = "text" name="location" id="skill-2" required="" class="form-control" />
              </div>
            </div>  

            <div class="col-sm-6">
              <div class="form-group">
                <label for="skill-3">Date</label>
                <input type = "text" name="date" id="skill-3" required="" class="form-control datepicker" readonly="" />
              </div>
            </div>  

          </div>

          <div class="row">
            
            <div class="col-sm-12">
              <div class="form-group">
                <label for="skill-4">Description</label>
                <textarea name="description" id="skill-4" rows="6" class="form-control"></textarea>
              </div>
            </div>  
          </div>

          <div class="row">
            <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Banner</label>
                    <input type="file" name="image">
                  </div>

            </div>
          </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Event</button>
        </div>
      </form>
    </div>
  </div>
</div>