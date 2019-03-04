@extends('layouts.email')

@section('content')
	<p>Accelevate Leads,</p>

	<p>
		{{ $request->name}} has sent a message through the contact form. Details Below:
	</p> <br>
	
	<table class="table table-striped">
		<tr>
            <th>Date</th>
            <td>{{ Carbon\Carbon::now() }}</td>
        </tr>

        <tr>
    		<th>Name</th>
    		<td>{{ $request->name }}</td>
    	</tr>

    	<tr>
    		<th>Email</th>
    		<td>{{ $request->email }}</td>
    	</tr>

    	<tr>
    		<th>Phone</th>
    		<td>{{ $request->phone }}</td>
    	</tr>

    	<tr>
    		<th>Message</th>
    		<td>{{ $request->message }}</td>
    	</tr>
    	

    </table>

@endsection