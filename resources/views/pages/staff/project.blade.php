@extends('layouts.agency')

@section('content')
<div class="container">
    <div class="row mt-50">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">{{ $project->question }}</div>

                <div class="panel-body">
                   

                    <div class="row">
                        <div class="col-lg-12">
                           
                            <h3>Question : {{ $project->question }}</h3>
                            <h4>Posted To : {{ $project->school->name }}</h4>
                            <h5>Posted : {{ $project->created_at->diffForHumans() }}</h5>
                            <p>Answers : {{ count($project->answers) }}</p>
   
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="panel panel-primary">
                <div class="panel-heading">Answers</div>
            </div>

            @if(count($project->answers))
                @foreach($project->answers as $answer)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h3><a href="{{ route('staff.user', ['id' => $answer->user->id]) }}">{{ $answer->user->name }}</a></h3>
                                </div>

                                <div class="col-sm-4">
                                    <a href="" data-toggle="modal" data-target="#mark-project-answer-{{ $answer->id }}" class="btn btn-info btn-sm float-right"><i class="fa fa-check"></i></a>

                                    @include('pages.staff.modals.mark-project-answer')
                                </div>
                            </div>
                            
                            <p>
                                <strong>Posted :</strong> {{ $answer->created_at->diffForHumans() }}
                                <br>

                               <strong>Answer:</strong>  <br> {{ $answer->answer }} <br>

                               <strong>Attachments:</strong> <br>

                               @if(count($answer->attachments))

                                    <ul>
                                        @foreach($answer->attachments as $attachment)
                                            <li><a href="{{ route('download', ['id' => $attachment->id]) }}">{{ $attachment->filename }}</a></li>
                                        @endforeach
                                    </ul> <br>

                               @endif 

                               <br><strong>Marks: </strong>{{ $answer->getMarks() }} <br>
                            </p>
                        </div>
                        
                        
                    </div> <br>
                @endforeach
            @else
                <h3>No answers for this project</h3>
            @endif
        </div>
    </div>
</div>
@endsection
