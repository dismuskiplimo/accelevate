@extends('layouts.agency')

@section('content')
	<div class="container">
		
			<div class="row my-50 h-400">
        
        
        <div class="col-sm-8">
          <div class="card">
            <img src="{{ $event->full_image() }}" class="card-img-top" alt="{{ $event->name }}"   class="img-fluid">
            <div class="card-body">
              <h5 class="card-title">{{ $event->name }}, <small text-muted>{{ $event->date }}</small></h5>
              <h6>{{ $event->location }}</h6>
              <p class="card-text">{{ $event->description }}</p>
            </div>
          </div>

        </div>
            
        
      </div>
			
		
	</div>

	
@endsection