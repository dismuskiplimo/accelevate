<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top{{ $shrink_nav ? '' : ' navbar-shrinks' }}" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="{{ route('homepage') }}/#page-top">{{ config('app.name') }}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive tiny">
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item">
          <a class="nav-link tiny" href="{{ route('homepage') }}">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link tiny js-scroll-trigger" href="{{ route('homepage') }}/#who-we-are">Who We Are</a>
        </li>

        <li class="nav-item">
          <a class="nav-link tiny js-scroll-trigger" href="{{ route('homepage') }}/#what-we-do">What We Do</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link tiny js-scroll-trigger" href="{{ route('homepage') }}/#our-team">Our Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link tiny js-scroll-trigger" href="{{ route('homepage') }}/#testimonials">Testimonials</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link tiny js-scroll-trigger" href="{{ route('homepage') }}/#contact">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link tiny" href="{{ route('front.events') }}">Events</a>
        </li>

      @if(auth()->check())
          
        @if(auth()->user()->is_student())
          <li class="nav-item">
            <a  class="nav-link tiny" href="{{ route('student.groups') }}">Groups</a>
          </li>
        @elseif(auth()->user()->is_staff())
          <li class="nav-item">
            <a class="nav-link tiny" href="{{ route('staff.groups') }}">Groups</a>
          </li>
        @endif
        

        <li class="dropdown nav-item" style=" margin-top:7px">
          <a href="#" class="dropdown-toggle tiny" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
            <img src="{{ profile_thumb(auth()->user()->thumb_url) }}" alt="" class="size-20 img-circle circle" style="margin-right:10px;">
            {{ auth()->user()->name }} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li class="ml-10"><a href="{{ route('dashboard') }}">Projects</a></li>
            <li class="ml-10"><a href="{{ route('user.profile.about') }}">About Me</a></li>
            <li class="ml-10"><a href="{{ route('user-profile') }}">My Profile</a></li>
            <li class="ml-10"><a href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </li>
      @else
        <li class="nav-item">
          <a  class="nav-link tiny" href="{{ route('register') }}">Register</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link tiny" href="{{ route('login') }}">Login</a>
        </li>
      @endif

      </ul>
    </div>
  </div>
</nav>