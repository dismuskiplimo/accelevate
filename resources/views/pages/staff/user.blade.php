@extends('layouts.agency')

@section('content')

<div class="container-fluid">
    <div class="row mtn-15" style="position:relative">
        <img src="{{ $user->cover() }}" alt="" class="img-fluid img-responsive">
       
    </div>
    

    <div class="container" style="position:relative">
        <div class="row  thumbnail-float">
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <img src="{{ $user->image() }}" alt="" class="img-responsive img-fluid circle  img-circle white-border">
                
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
           
            @if($user->is_student() && !$me)
                <div class="panel panel-info">
                    <div class="panel-heading">Review Student</div>

                    <div class="panel-body">
                        <form action="{{ route('user.review', ['id' => $user->id]) }}" method="POST">
                            @csrf

                             <div class="form-group">
                                <label for="">Rating</label>

                                <div class="radio text-warning">
                                    <input type="radio" name="rating" id="" value="1">
                                    <i class="fa fa-star mr-10"></i>

                                    <input type="radio" name="rating" id="" value="2">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star mr-10"></i>

                                    <input type="radio" name="rating" id="" value="3" checked="">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star mr-10"></i>

                                    <input type="radio" name="rating" id="" value="4">
                                    <i class="fa fa-star"></i> 
                                    <i class="fa fa-star"></i> 
                                    <i class="fa fa-star"></i> 
                                    <i class="fa fa-star mr-10"></i> 
                                    
                                    <input type="radio" name="rating" id="" value="5"> 
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Review</label>
                                <textarea id="" rows="3" name="review" class="form-control" required=""></textarea>
                            </div>

                            <button class="btn btn-info" type="submit">Submit Review</button>
                        </form>
                    </div>
                </div>
            @endif

            <br><h3>Reviews ({{ number_format(count($user->reviews)) }})</h3>

            @if(count($user->reviews))
                @foreach($user->reviews as $review)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>
                                <strong>{{ $review->staff->name }} 

                                    @for($i = 0 ; $i< $review->rating; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor

                                </strong> <small>, {{ $review->created_at->diffForHumans() }}</small> <br>

                                <small>{{ $review->review }}</small>
                            </p>
                        </div>
                    </div> <br>
                @endforeach
            @else
                <p>No reviews made</p>
            @endif

            <div class="row">
                <div class="col-sm-12">
                            <h4>ABOUT ME</h4>

                            <h5>
                                About:

                                @if($me)
                                    <a href="" data-toggle="modal" data-target="#about-me" class="btn btn-xs btn-info pull-right">Edit</a>
                                @endif
                            </h5>
                            <hr class = "mtn-5">
                            {!! clean(nl2br($user->about_me ? : 'No Details')) !!}
                                
                            
                            <br>
                                <h5>
                                    Memberships:
                                    @if($me)
                                        <a href="" data-toggle="modal" data-target="#add-membership" class="btn btn-xs btn-info pull-right"><i class="fa fa-plus"></i> Add Membership</a>
                                    @endif
                                </h5>
                            <hr class = "mtn-5">
                            
                            @if(count($user->memberships))
                                
                                <ul class="ml-20">
                                    @foreach($user->memberships as $membership)
                                        <li>
                                            {{ $membership->name }}
                                            @if($me)
                                                <span class="pull-right">
                                                    <button class="btn btn-warning btn-xs" type="button"  data-toggle="modal" data-target="#edit-membership-{{ $membership->id }}"  title="edit {{ $membership->name }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button> 

                                                    <button class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#delete-membership-{{ $membership->id }}" title="delete {{ $membership->name }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button> 
                                                </span>

                                                @include('pages.user.modals.edit-membership')
                                                @include('pages.user.modals.delete-membership')
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>

                            @else
                                <p class="ml-20">No Memberships Stated</p>
                            @endif

                            <h5>
                                Education:
                                @if($me)
                                    <a href="" data-toggle="modal" data-target="#add-education" class="btn btn-xs btn-info pull-right"><i class="fa fa-plus"></i> Add Education</a>
                                @endif
                            </h5>
                            <hr class = "mtn-5">
                            <div>
                                @if(count($user->education))
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>School</th>
                                                <th>Level</th>
                                                <th>Field of Study</th>
                                                <th>Grade</th>

                                                @if($me)
                                                    <th></th>
                                                @endif
                                            </tr>
                                            
                                            
                                            
                                        </thead>

                                        <tbody>
                                            @foreach($user->education as $education)
                                                <tr>
                                                    <td>{{ $education->start_year }}</td>
                                                    <td>{{ $education->end_year }}</td>
                                                    <td>{{ $education->school }}</td>
                                                    <td>{{ $education->level }}</td>
                                                    <td>{{ $education->field_of_study }}</td>
                                                    <td>{{ $education->grade }}</td>
                                                    
                                                    @if($me)
                                                        <td>
                                                            @include('pages.user.modals.edit-education')
                                                            @include('pages.user.modals.delete-education')
                                                        </td>

                                                        <td class="text-right">
                                                            <button class="btn btn-warning btn-xs" type="button"  data-toggle="modal" data-target="#edit-education-{{ $education->id }}"  title="edit {{ $education->school }}">
                                                                <i class="fa fa-edit"></i>
                                                            </button> 

                                                            <button class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#delete-education-{{ $education->id }}" title="delete {{ $education->school }}">
                                                                <i class="fa fa-trash"></i>
                                                            </button>   

                                                            
                                                        </td>

                                                        
                                                    @endif
                                                    
                                                </tr>
                                                
                                            @endforeach
                                        </tbody>
                                        
                                    </table>
                                @else
                                    <p class="ml-20">No Education Info</p>
                                @endif
                            </div>

                            <h5>
                                Work Experience:
                                @if($me)
                                    <a href="" data-toggle="modal" data-target="#add-work-experience" class="btn btn-xs btn-info pull-right"><i class="fa fa-plus"></i> Add Work Experience</a>
                                @endif
                            </h5>
                            
                            <hr class = "mtn-5">
                            <div>
                                @if(count($user->work_experience))
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Company</th>
                                                <th>Position</th>

                                                @if($me)
                                                    <th></th>
                                                @endif
                                            </tr>
                                            
                                            
                                            
                                            
                                        </thead>

                                        <tbody>
                                            @foreach($user->work_experience as $work_experience)
                                                <tr>
                                                    <td>{{ $work_experience->from_date }}</td>
                                                    <td>{{ $work_experience->to_date }}</td>
                                                    <td>{{ $work_experience->company }}</td>
                                                    <td>{{ $work_experience->position }}</td>
                                                    
                                                    @if($me)
                                                        <td>
                                                            @include('pages.user.modals.edit-work-experience')
                                                            @include('pages.user.modals.delete-work-experience')
                                                        </td>

                                                        <td class="text-right">
                                                            <button class="btn btn-warning btn-xs" type="button"  data-toggle="modal" data-target="#edit-work-experience-{{ $work_experience->id }}"  title="edit {{ $work_experience->company }}">
                                                                <i class="fa fa-edit"></i>
                                                            </button> 

                                                            <button class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#delete-work-experience-{{ $work_experience->id }}" title="delete {{ $work_experience->company }}">
                                                                <i class="fa fa-trash"></i>
                                                            </button> 

                                                        </td>


                                                    @endif
                                                </tr>
                                                
                                            @endforeach
                                        </tbody>
                                        
                                    </table>
                                @else
                                    <p class="ml-20">No Work Expereince Stated</p>
                                @endif
                            </div>
                            
                            <br>

                            <h5>
                                Skills:
                                @if($me)
                                    <a href="" data-toggle="modal" data-target="#add-skill" class="btn btn-xs btn-info pull-right"><i class="fa fa-plus"></i> Add Skill</a>
                                @endif
                            </h5>
                            <hr class = "mtn-5">
                            
                            @if(count($user->skills))
                                <ul class="ml-20">
                                    @foreach($user->skills as $skill)
                                        <li>
                                            {{ $skill->skill }}
                                            
                                            @if($me)
                                                <span class="pull-right">
                                                    <button class="btn btn-warning btn-xs" type="button"  data-toggle="modal" data-target="#edit-skill-{{ $skill->id }}"  title="edit {{ $skill->skill }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button> 

                                                    <button class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#delete-skill-{{ $skill->id }}" title="delete {{ $skill->skill }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button> 
                                                </span>

                                                @include('pages.user.modals.edit-skill')
                                                @include('pages.user.modals.delete-skill')
                                            @endif

                                        </li>
                                    @endforeach
                                </ul>
                                

                            @else
                                <p class="ml-20">No Skills Stated</p>
                            @endif
                            
                            <br>

                            <h5>
                                Awards:
                                @if($me)
                                    <a href="" data-toggle="modal" data-target="#add-award" class="btn btn-xs btn-info pull-right"><i class="fa fa-plus"></i> Add Award</a>
                                @endif
                            </h5>
                            <hr class = "mtn-5">
                            
                            @if(count($user->awards))
                                <ul class="ml-20">
                                    @foreach($user->awards as $award)
                                        <li>
                                            {{ $award->name }}, {{ $award->year }} 
                                            
                                            @if($me)
                                                <span class="pull-right">
                                                    <button class="btn btn-warning btn-xs" type="button"  data-toggle="modal" data-target="#edit-award-{{ $award->id }}"  title="edit {{ $award->name }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button> 

                                                    <button class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#delete-award-{{ $award->id }}" title="delete {{ $award->name }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button> 
                                                </span>

                                                @include('pages.user.modals.edit-award')
                                                @include('pages.user.modals.delete-award')
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                                

                            @else
                                <p class="ml-20">No Awards Stated</p>
                            @endif

                            <br>
                            <h5>
                                Hobbies:
                                @if($me)
                                    <a href="" data-toggle="modal" data-target="#add-hobby" class="btn btn-xs btn-info pull-right"><i class="fa fa-plus"></i> Add Hobby</a>
                                @endif
                            </h5>
                            <hr class = "mtn-5">

                            @if(count($user->hobbies))                        
                                <ul class="ml-20">
                                    @foreach($user->hobbies as $hobby)
                                        <li>
                                            {{ $hobby->name }}

                                            @if($me)
                                                <span class="pull-right">
                                                    <button class="btn btn-warning btn-xs" type="button"  data-toggle="modal" data-target="#edit-hobby-{{ $hobby->id }}"  title="edit {{ $hobby->name }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button> 

                                                    <button class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#delete-hobby-{{ $hobby->id }}" title="delete {{ $hobby->name }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button> 
                                                </span>

                                                @include('pages.user.modals.edit-hobby')
                                                @include('pages.user.modals.delete-hobby')
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="ml-20">No Hobbies Stated</p>
                            @endif

                            <br>
                            <h5>
                                Achievements:
                                @if($me)
                                    <a href="" data-toggle="modal" data-target="#add-achievement" class="btn btn-xs btn-info pull-right"><i class="fa fa-plus"></i> Add Achievements</a>
                                @endif
                            </h5>
                            <hr class = "mtn-5">

                            @if(count($user->achievements))
                                
                                <ul class="ml-20">
                                    @foreach($user->achievements as $achievement)
                                        <li>
                                            {{ $achievement->name }}

                                            @if($me)
                                                <span class="pull-right">
                                                    <button class="btn btn-warning btn-xs" type="button"  data-toggle="modal" data-target="#edit-achievment-{{ $achievement->id }}"  title="edit {{ $achievement->name }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button> 

                                                    <button class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#delete-achievement-{{ $achievement->id }}" title="delete {{ $achievement->name }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </span>

                                                @include('pages.user.modals.edit-achievement')
                                                @include('pages.user.modals.delete-achievement')
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                                
                            @else
                                <p class="ml-20">No Achievements Stated</p>
                            @endif
                        </div>
            </div>
        </div>
    </div>
</div>

@if($me)
    @include('pages.user.modals.about-me')
    @include('pages.user.modals.add-membership')
    @include('pages.user.modals.add-award')
    @include('pages.user.modals.add-hobby')
    @include('pages.user.modals.add-achievement')
    @include('pages.user.modals.add-education')
    @include('pages.user.modals.add-work-experience')
    @include('pages.user.modals.add-skill')
   
@endif

@endsection
