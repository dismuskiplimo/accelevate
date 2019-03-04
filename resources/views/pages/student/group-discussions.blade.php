@extends('layouts.agency')

@section('content')
<div class="container">
    <div class="row mt-50" style="min-height:400px">
        <div class="col-md-8 col-md-offset-2">
            <p class=" text-right">
                
                <a href="{{ route('student.group-assignments', ['id' => $group->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> BACK TO GROUP</a>



                
                                  
            </p>

            <div class="panel panel-default">
                <div class="panel-heading">Group : {{ $group->name }}</div>

                <div class="panel-body">
                   

                    <div class="row">
                        <div class="col-lg-12">
                           <h4>Group Discussion({{ number_format($discussions->total()) }})</h4>
                            
                            <div class="div">
                                <form action="{{ route('discussion.post', ['id' => $group->id]) }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="">What would you like to post?</label>
                                        <textarea name="content" class="form-control" id="" rows="5" required="" placeholder="write something"></textarea>
                                    </div>

                                    <button class="btn btn-info" type="submit">POST</button>
                                </form>

                                <hr>
                            </div>
                            @if($discussions->total())
                                @foreach($discussions as $discussion)
                                    <div class="media">
                                      <a href="{{ route('student.user', ['id' => $discussion->user->id]) }}">
                                      <img class="mr-3 size-40" src="{{ $discussion->user->image() }}" alt="Generic placeholder image">
                                      </a>
                                      <div class="media-body">
                                        <h5 class="mt-0"><small>{{ $discussion->user->name }}</a> | <small class="text-muted tiny">{{ $discussion->created_at->diffForHumans() }}</small> </small></h5>
                                        
                                        <p>{{ $discussion->content }}</p>

                                        <p>Comments({{ count($discussion->comments) }})</p>

                                        <hr>

                                        @if($discussion->comments)
                                            @foreach($discussion->comments as $comment)
                                                <div class="media mt-3">
                                                  <a class="pr-3" href="{{ route('student.user', ['id' => $comment->user->id]) }}">
                                                    <img src="{{ $comment->user->image() }}" alt="Generic placeholder image" class="size-40">
                                                  </a>
                                                  <div class="media-body">
                                                    <h5 class="mt-0"><small>{{ $comment->user->name }}</a> | <small class="text-muted tiny">{{ $comment->created_at->diffForHumans() }}</small></small></h5>
                                                    
                                                    <p>{{ $comment->content }}</p>

                                                  </div>
                                                </div>

                                                
                                            @endforeach
                                        @endif

                                        <form action="{{ route('comment.post', ['id' => $discussion->id]) }}" method = "POST">
                                            @csrf
                                            
                                            <div class="form-group">
                                                
                                                <textarea name="content" class="form-control" id="" rows="3" required="" placeholder="write comment"></textarea>
                                            </div>

                                            <button class="btn btn-info" type="submit">Comment</button>

                                        </form>

                                        
                                      </div>
                                    </div>

                                    

                                    <hr>
                                @endforeach

                                {{ $discussions->links() }}
                               
                            @else
                                No discussions in this group
                            @endif
   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
