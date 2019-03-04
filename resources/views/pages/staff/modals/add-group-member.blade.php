<div class="modal fade" id="add-group-member">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('staff.group-member.add', ['id' => $group->id]) }}" method="POST">
        @csrf
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Group Member</h4>
        </div>
        
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="skill-1">Student</label>
                <select name="student_id" id="student_id" required="" class="form-control">
                  <option value="">--Select Student--</option>

                  @foreach($students as $student)
                    @if(in_array($student->id, $ids))
                      @php
                        continue;
                      @endphp
                    @endif
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                  @endforeach

                </select>
              </div>
            </div>
          </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Student to Group</button>
        </div>
      </form>
    </div>
  </div>
</div>