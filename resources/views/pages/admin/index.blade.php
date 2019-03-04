@extends('layouts.agency')

@section('content')
<div class="container">
    <div class="row mt-50" style="min-height:400px">
        <div class="col-md-8 col-md-offset-2">
            <p class="text-right">
            	<a href="" data-toggle="modal" data-target="#add-event" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> ADD EVENT</a>
            </p>

            <div class="panel panel-info">
                <div class="panel-heading">Events ({{ number_format(count($events)) }})</div>

                <div class="panel-body">
                    @if(count($events))
						<table class="table table-striped">
							<thead>
								<tr>
									<th></th>
									<th>Date</th>
									<th>Event</th>
									<th>Location</th>
									<th>Description</th>
									<th></th>
								</tr>
							</thead>

							<tbody>
								@foreach($events as $event)
									<tr>
										<td></td>
										<td>{{ $event->date }}</td>
										<td>{{ $event->name }}</td>
										<td>{{ $event->location }}</td>
										<td>{{ $event->description }}</td>
										<td class="text-right">
											<form action="{{ route('admin.event.delete', ['id' => $event->id]) }}" method="POST">
												@csrf

												<button type="submit" class="btn btn-danger btn-xs" title="Dalete {{ $event->name }}"><i class="fa fa-trash"></i></button></td>
									</tr>
											</form>
											
								@endforeach
							</tbody>
						</table>
                    @else
						<p>No Events Posted</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('pages.admin.modals.add-event')

@endsection
