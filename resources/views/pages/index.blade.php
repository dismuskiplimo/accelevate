@extends('layouts.agency')

@section('content')
	<div class="container-fluid">
		@if(count($events))
			<div class="row">
				<div class="bd-example">
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              @for($cnt = 0; $cnt < count($events); $cnt++)
              
                <li data-target="#item-carousel" data-slide-to="{{ $cnt }}" class="{{ $cnt == 0 ? 'active' : '' }}"></li>
                
              @endfor
            </ol>
            <div class="carousel-inner">
              @php
                $cnt = 0;
              @endphp

              @foreach($events as $event)
                <div class="carousel-item {{ $cnt == 0 ? ' active' : '' }}">
                  <img src = "{{ $event->image() }}" alt="{{ $event->name }}" class="img-fluid">
                  <div class="carousel-caption d-none d-md-block white-text">
                    <h5>{{ $event->name }}</h5>
                    <p>{{ $event->date }}</p>
                    
                  </div>
                </div>
                @php
                  $cnt++;
                @endphp
              @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>

        
			</div>
			
		@else
			<div class="row banner-image fullscreen text-center">
				<div class="centered col-sm-6">
					<img src="{{ asset('img/logo-large-light.png') }}" alt="" class="img-responsive mb-50">
					
					
						<a href="{{ route('register') }}" class="btn btn-lg btn-primary" style="margin-right:20px"><i class="fa fa-user"></i> Register</a>
						<a href="{{ route('login') }}" class="btn btn-lg btn-success"><i class="fa fa-sign-in"></i> Login</a>
					
					

				</div>
			</div>
		@endif
	</div>

    <!-- Services -->
    <section id="who-we-are">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Who we are</h2>
          </div>
        </div>
        <div class="text-center">
            <p>
              {{ config('app.name') }} is a social enterprise whose vision is to unlock skills potential and solve real problems of the world. Our primary mission is to provide a platform for university students and graduates to gain the skills and experience required by the marketplace.  We strive to reduce the high rate of unemployment amongst our most educated generation by working closely with industry players who transfer their skills in a challenge driven, solve problem environment. 
            </p>

            <p>
              We believe a younger generation equipped with knowledge and skills that solve problems are the bridge of inequality in Kenya and Africa. 
            </p>
        </div>
      </div>
    </section>

    <!-- Portfolio Grid -->
    <section class="bg-light" id="what-we-do">
      

      <div class="container">
        <div class="row mb-40">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">What we do</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <div class="">
                <p>
                  {{ config('app.name') }} organizes experiential skills training programs where students interact with personnel from various organizations. The program ensures university students and graduates acquire practical marketplace skills and experience while offering industry players affordable and sustainable research & innovation hubs.
                </p>

                <p>
                  Through corporate volunteerism, we facilitate the transference of employable skills. Through student volunteerism, we facilitate corporate ‘inhouse’ innovation hubs where students/graduates create innovative and practical solutions for real industry problems in an affordable, faster way. 
                </p>

                
            </div>
          </div>
          
          <div class="col-sm-6">
            <img src="{{ my_asset('img/accelevate/1.jpg') }}" alt="" class="img-fluid">
          </div>
        </div>

        <div class="row mt-30">
          <div class="col-sm-6">
            <img src="{{ my_asset('img/accelevate/2.jpg') }}" alt="" class="img-fluid">
          </div>
          
          <div class="col-sm-6">
            <p>
                  By being on ground in universities and in company boardrooms investing in African businesses through the transfer of skills we deliver the following interventions;
                </p>

                <p>
                  <ul>
                    <li>
                      A hub of new innovative ideas from students. 
                    </li>
                    
                    <li>
                      A reliable bridge between the Higher learning institutions and organizations. 
                    </li>
                    
                    <li>
                      Transfer of skills to students and graduates from companies and organizations 
                    </li>
                    
                    <li>
                      An open and combinatorial system that keeps evolving and flexible problem solvers who change with the times.
                    </li>
                    
                    <li>
                      A high performance culture that thrives on excellence, candor and change.
                    </li>
                    
                    <li>
                      A resourceful pull of performing students and graduates ready to learn and work. 
                    </li>
                  </ul>
                </p>
          </div>
        </div>
        
      </div>
    </section>

    <!-- About -->
    <section id="our-team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Our Team</h2>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-lg-12">
           	<p class="mb-50">
      				We are a team of diverse people but common to all of us is that we are passionate about employability of young people, growth of businesses and we want to make a difference. We know that insight and creative problem solving are quicker to develop at the intersection of different ways of thinking and world views.
      			</p>

            <div class="row">
              <div class="col-sm-4">
                <img src="{{ my_asset('img/default-user.png') }}" alt="" class="img-fluid circle mb-50">
                <h4>Eric Bakuli</h4>
                <p>Student coordinator and Social media manager</p>
              </div>

              <div class="col-sm-4">
                <img src="{{ my_asset('img/default-user.png') }}" alt="" class="img-fluid circle mb-50">
                <h4>Dennis</h4>
                <p>Software Developer and IT</p>
              </div>

              <div class="col-sm-4">
                <img src="{{ my_asset('img/default-user.png') }}" alt="" class="img-fluid circle mb-50">
                <h4>John Owegi</h4>
                <p>Legal and Finance</p>
              </div>

            </div>

            <div class="row">
              <div class="col-sm-4">
                <img src="{{ my_asset('img/default-user.png') }}" alt="" class="img-fluid circle mb-50">
                <h4>Fauzia Nia Mohammed</h4>
                <p>Program Assistant</p>
              </div>

              <div class="col-sm-4">
                <img src="{{ my_asset('img/default-user.png') }}" alt="" class="img-fluid circle mb-50">
                <h4>Nicolle Ndamu</h4>
                <p>People Development</p>
              </div>

              <div class="col-sm-4">
                <img src="{{ my_asset('img/default-user.png') }}" alt="" class="img-fluid circle mb-50">
                <h4>Mrs Viridiana Mutere</h4>
                <p>Founder and CEO</p>
              </div>

            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="testimonials">
      <div class="container">
        <div class="row mb-40">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Testimonials</h2>
            
          </div>
        </div>
        <div class="text-center">
        	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <h4>Petronila Nguono <br> <small>BA in sociology and conflict and peace studies University of Nairobi</small></h4>
                <p>
                  <i>
                  EST has helped sharpen my listening skills and equipped me to be a critical thinker. I am also at a place now where I am able to boldly take risks. My leadership and communication skills have also been sharpened. I am super confident when it comes to expressing myself because the presentations we made during the challenges made me believe in myself more than I did before. Lastly, I am better equipped to work with different personalities because the EST program exposed me to people from all walks of life and I learnt how to work alongside them during projects and this sharpened my human relations skills.
                  </i>
                </p>
              </div>

              <div class="carousel-item">
                <h4>Luvunga Espoir <br> <small>Bachelor of commerce. Major in finance Kenyatta University</small></h4>
                <p>
                  <i>
                    The EST Program was helpful and productive to me, today I am privileged and proud to put the program in my CV, I learned a lot through the program. The program helped me expand my thinking, groomed me to learn how to make decisions and plan for my career. When we did the decision making challenge, it improved my outlook on how I should make decisions for my business going forward in my career path. During the program I came up with a business idea and I'm thinking of pursuing it full time after school. The various skills learned, challenges attempted, seminars, and lectures from the EST program, I intend to practice them in my upcoming business. 
                  </i>
                </p>
              </div>

              <div class="carousel-item">
                <h4>Nicolle Ndamu <br> <small>International Relation USIU - Africa</small></h4>
                <p>
                  <i>
                    The EST program is a program I would recommend to anyone who is interested in finding out what the job market wants a graduate to have. Depending on the company you pick to guide you through the year long program, the skills you gain are a great addition to your undergraduate degree. It’s a platform that sharpens leadership skills, project management skills and teamwork. Together with peers, we are challenged to solve real time problems and provide timely solution to the various projects presented by a company. 
                  </i>
                </p>
              </div>

            </div>
           
          </div>
        </div>
      </div>
    </section>

	

	<!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-light">
              We are always happy to hear from you. <br>
              skillshunt@accelevateleads.com, 0777311680
            </h3>
            
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="" name="sentMessage" novalidate="novalidate" action="{{ route('front.contact-us') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" name="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" name="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" name="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" name="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


	
@endsection