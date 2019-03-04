@extends('layouts.agency')

@section('content')
<div class="container">
    <div class="row mt-50" style="min-height:400px">
        <div class="col-md-8 col-md-offset-2">
            <p class="text-right">
                <button data-toggle="modal" data-target="#add-group" class="btn btn-success btn-sm" type="button"><i class="fa fa-plus"></i> ADD GROUP</button>    
            </p>
            
            <div class="panel panel-info">
                <div class="panel-heading">My Groups ({{ number_format(count($groups)) }})</div>

                <div class="panel-body">
                   

                    <div class="row">
                        <div class="col-lg-12">
                           
                            @if(count($groups))
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Group Name</th>
                                            <th class="text-right">Members</th>
                                            <th class="text-right">Assignments</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($groups as $group)
                                            <tr>
                                                <td>{{ $group->name }}</td>
                                                <td class="text-right">{{ number_format(count($group->members)) }}</td>
                                                <td class="text-right">{{ number_format(count($group->assignments)) }}</td>
                                                <td class="text-right"><a href="{{ route('staff.group-assignments', ['id' => $group->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                No groups created
                            @endif
   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('pages.staff.modals.add-group')

@endsection
