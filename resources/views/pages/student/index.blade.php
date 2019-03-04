@extends('layouts.agency')

@section('content')
<div class="container">
    <div class="row mt-50 h-400">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Projects</div>

               
            </div>

            @if(count($projects))
               @foreach($projects as $project)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <br><h4>
                                <a href="{{ route('student.project', ['slug' => $project->slug]) }}">Project : {{ $project->question }}</a></h4>
                            <p>Posted : {{ $project->created_at->diffForHumans() }}</p>
                            <p>Answers : {{ $project->answers()->count() }}</p>
                        </div>

                    </div><br>
               @endforeach

               {{ $projects->links() }}
                
            @else
                <h3 class="text-center">No Projects for your school</h3>
            @endif
            
        </div>
    </div>
</div>
@endsection
