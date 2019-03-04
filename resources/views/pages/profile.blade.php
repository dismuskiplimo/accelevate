@extends('layouts.agency')

@section('content')

<div class="container-fluid">
    <div class="row" style="position:relative; margin-top:-15px;">
        <img src="{{ $user->cover() }}" alt="" class="img-responsive img-fluid">

        <button class="btn btn-info cover-picture cover-edit" type="button"><i class="fa fa-edit"></i> Update Cover Image</button>

        <form action="{{ route('update-cover') }}" method="POST" enctype="multipart/form-data" class="hidden cover-form">
            @csrf
            <input type="file" name="image"  class="cover-file">
        </form>
    </div>
    

    <div class="container" style="position:relative">
        <div class="row  thumbnail-float">
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <img src="{{ $user->image() }}" alt="" class="img-responsive img-fluid img-circle circle profile-picture white-border" title="Click to update profile picture">

                <form action="{{ route('update-image') }}" method="POST" enctype="multipart/form-data" class="hidden image-form">
                    @csrf
                    <input type="file" name="image" class="image-file">
                </form>
            </div>  

            <div class="col-xs-6 col-sm-6 col-md-8 col-lg-9 col-xl-10">
                <h1 class="white-text mt-25">{{ $user->name }}</h1>
            </div> 
        </div>
    </div>
    
</div>

<div class="container">
    

    <div class="row mt-50">
        <div class="col-md-3">
            <div class="panel">
                

                <div class="panel-body">
                    
                    
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
        
        <div class="col-md-9">

            <div class="panel panel-default mb-20">
                <div class="panel-heading">User Details</div>
                <div class="panel-body">
                    <form action="{{ route('update-profile') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>
                        </div>

                        <button class="btn btn-info" type="submit">Update Profile</button>
                    </form>        
                </div>
            </div>

            <div class="panel panel-default mb-20">
                <div class="panel-heading">Password</div>
                <div class="panel-body">
                    <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="old_password">Old Password</label>
                            <input id="old_password" type="password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" name="old_password" required>
                        </div>

                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input id="new_password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" required>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Retype New Password</label>
                            <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="new_password_confirmation" required>
                        </div>

                        <button class="btn btn-info" type="submit">Change Password</button>
                    </form>        
                </div>
            </div>
            

            @if($user->is_student())
                <h3>Reviews ({{ number_format(count($user->reviews)) }})</h3>

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
            @endif

            
        </div>
    </div>
</div>
@endsection
