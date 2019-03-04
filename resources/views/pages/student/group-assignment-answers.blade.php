@extends('layouts.agency')

@section('content')
<div class="container">
    <div class="row mt-50" style="min-height:400px">
        <div class="col-md-8 col-md-offset-2">
           <p class="">
                

                <a href="{{ route('student.group-assignments', ['id' => $group->id]) }}" class="btn btn-warning btn-sm float-right"><i class="fa fa-arrow-left"></i> BACK TO GROUP QUESTIONS</a>

                @if($answered)
                    
                @else
                    <a href="" data-toggle="modal" data-target="#answer-group-assignment" class="btn btn-success btn-sm"><i class="fa fa-check"></i> ANSWER</a>            
                @endif
                                  
            </p>
            
            <div class="panel panel-info">
                <div class="panel-heading">{{ $assignment->question }}</div>

                <div class="panel-body">
                   

                    <div class="row">
                        <div class="col-lg-12">
                           <h4>Answers:</h4>
                            @if(count($answers))
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Student</th>
                                            
                                            <th>Answer</th>
                                            <th>Marks</th>
                                            <th></th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($answers as $answer)
                                            <tr>
                                                <td>{{ $answer->user->name }}</td>
                                                
                                                <td>{{ $answer->answer }}</td>
                                                <td>{{ $answer->getMarks() }}</td>
                                                <td>{{ $answer->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                No answers to this question
                            @endif


   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('pages.student.modals.answer-group-assignment')

@endsection
