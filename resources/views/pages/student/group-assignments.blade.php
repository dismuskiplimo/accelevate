@extends('layouts.agency')

@section('content')
<div class="container">
    <div class="row mt-50" style="min-height:400px">
        <div class="col-md-8 col-md-offset-2">
            <p class="">
                <a href="{{ route('student.group.discussion', ['id' => $group->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-comment"></i> GROUP DISCUSSION</a>

                <a href="{{ route('student.groups') }}" class="btn btn-warning btn-sm float-right"><i class="fa fa-arrow-left"></i> BACK TO GROUPS</a>



                
                                  
            </p>

            <div class="panel panel-info">
                <div class="panel-heading">Group : {{ $group->name }}</div>

                <div class="panel-body">
                   

                    <div class="row">
                        <div class="col-lg-12">
                           <h4>Assignments for Group</h4>
                            @if(count($assignments))
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Question</th>
                                            
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($assignments as $assignment)
                                            <tr>
                                                <td>{{ $assignment->question }}</td>
                                                
                                                <td class="text-right"><a href="{{ route('student.group-assignment.answers',['id' => $group->id,'assignment_id' => $assignment->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                No assignments in this group
                            @endif
   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
