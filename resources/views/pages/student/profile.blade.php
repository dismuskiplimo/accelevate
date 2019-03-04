@extends('layouts.agency')

@section('content')
<div class="container">
    <div class="row mt-50">
        <div class="col-md-3">
            <div class="panel">
                

                <div class="panel-body">
                    <img src="{{ profile_pic($user->img_url) }}" alt="" class="img-responsive img-circle">
                    
                    <p class = "text-center">
                            <br><small>
                                <strong>Name </strong><br>{{ $user->name }} <br> <br>
                                <strong>Institution  </strong><br>{{ $user->school->name }} <br> <br>
                                <strong>Email </strong><br> {{ $user->email }} <br>
                            </small>
                            
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-5">

            <br><h3>Reviews ({{ number_format(count($user->reviews)) }})</h3>

            @if(count($user->reviews))
                @foreach($user->reviews as $review)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>
                                <strong>{{ $review->staff->name }},</strong> <small>{{ $review->created_at->diffForHumans() }}</small> <br>

                                <small>{{ $review->review }}</small>
                            </p>
                        </div>
                    </div> <br>
                @endforeach
            @else
                <p>No reviews made</p>
            @endif
        </div>
    </div>
</div>
@endsection
