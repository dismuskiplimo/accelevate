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
            <div class="panel panel-default">
                <div class="panel-heading">Answer</div>

                <div class="panel-body">
                    <h4>My Answer</h4>

                    @if($answer)
                        
                        
                        Posted : {{ $answer->created_at }} <br>
                        Answer : {{ $answer->answer }} <br>
                        Attachments : <br>

                        @if(count($answer->attachments))
                            <ul>
                                @foreach($answer->attachments as $attachment)
                                    <li><a href="{{ route('download', ['id' => $attachment->id]) }}">{{ $attachment->filename }}</a></li>
                                @endforeach 
                            </ul>
                            
                        @else
                            No Attachment <br> <br>
                        @endif

                        Marks: <strong>{{ $answer->getMarks() }}</strong> <br>
                    @else
                        

                        <form action="" method = "POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="">Answer</label>
                                <textarea class="form-control" name="answer" required="" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Attachment</label> <br>
                                <input type="file" name="attachment">
                            </div>

                            <button class="btn btn-info" type="submit">Post Answer</button>
                        </form>


                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
