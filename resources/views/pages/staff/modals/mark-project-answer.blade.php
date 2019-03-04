<div class="modal fade" id="mark-project-answer-{{ $answer->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('staff.project.answer.mark', ['id' => $answer->id]) }}" method="POST">
        @csrf
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Mark Assignment</h4>
        </div>
        
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="skill-1">Marks (Out of {{ config('app.total_marks') }})</label>
                <input type = "number" name="marks" id="skill-1" required="" class="form-control" value="{{ $answer->marks }}" min="0" max="{{ config('app.total_marks') }}" />
              </div>
            </div>   
          </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Mark</button>
        </div>
      </form>
    </div>
  </div>
</div>