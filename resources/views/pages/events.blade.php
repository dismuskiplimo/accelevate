@extends('layouts.agency')

@section('content')
	<div class="container">
		
			<div class="row my-50 h-400">
        <div class="col-sm-12">
          <h3>Events ({{ number_format(count($events)) }})</h3>
        </div>
        @if(count($events))
          @foreach($events as $event)
              <div class="col-sm-4">
                <div class="card">
                  <img src="{{ $event->image() }}" class="card-img-top" alt="{{ $event->name }}"   class="img-fluid">
                  <div class="card-body">
                    <h5 class="card-title">{{ $event->name }}, <small text-muted>{{ $event->date }}</small></h5>
                    <h6>{{ $event->location }}</h6>
                    <p class="card-text">{{ $event->description }}</p>
                    <a href="{{ route('front.event', ['id' => $event->id]) }}" class="btn btn-primary">View Event</a>
                  </div>
                </div>

              </div>
              
          @endforeach
        @else
          <div class="col-sm-12">
            <h4 class="text-center">No Events</h4>
          </div>
          
        @endif
      </div>
			
		
	</div>

	
@endsection