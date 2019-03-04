@extends('layouts.agency')

@section('content')
<div class="container">
    <div class="row mt-50">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Create Project</div>

                <div class="panel-body">
                    
                    <div class="row">
                        <div class="col-lg-12">
                           

                            <form action="{{ route('dashboard.staff') }}" method = "POST">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="">Question</label>
                                    <textarea name="question" id="" cols="" rows="3" required="" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Post To:</label>
                                    <select name="school_id" id="" required="" class="form-control">
                                        <option value=""> --Select Institution-- </option>
                                        @foreach($schools as $school)
                                            <option value="{{ $school->id }}">{{ $school->name }}</option>
                                        @endforeach
                                    </select>
                                   
                                </div>

                                <button type="submit" class="btn btn-info">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="panel panel-info">
                <div class="panel-heading">My Projects</div>
            </div>

            @if(count($projects))
                @foreach($projects as $project)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            
                            <h3><a href="{{ route('staff.project', ['slug' => $project->slug]) }}">{{ $project->question }}</a></h3>
                            <p>
                                Posted to : <strong>{{ $project->school ? $project->school->name : 'N/A' }}</strong>
                                <br>


                               Answers: {{ count($project->answers) }} 

                               <small>
                                    <span class="float-right">{{ $project->created_at->diffForHumans() }}</span>
                                    
                                </small>
                            </p>
                            
                        </div>
                       
                        
                    </div> <br>
                @endforeach
            @else
                <h3>You havent posted any projects</h3>
            @endif
        </div>
    </div>
</div>
@endsection
