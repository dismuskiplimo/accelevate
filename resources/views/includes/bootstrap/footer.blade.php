		<div class="container-fluid">
			<div class="row footer" >
				<div class="container">
					<div class="row">
			            <div class="col-sm-3 text-center">
			                <img alt="logo" class="img-responsive" src="{{ my_asset('img/logo-light.png') }}" />
			                
			                <span>{{ config('app.name') }}</span>
			                <a href="mailto:hello@accelevate.com" class="">
			                    hello@accelevate.com
			                </a>
			            </div>

			            <div class="col-sm-6 text-center">
			                <ul class="">
			                    <li>
			                        <a href="#">
			                            Staff Login
			                        </a>
			                    </li>
			                    <li>
			                        <a href="#">
			                            Student Login
			                        </a>
			                    </li>
			                    <li>
			                        <a href="#">
			                            Terms and Conditions
			                        </a>
			                    </li>
			                    <li>
			                        <a href="#">
			                            Support and Help
			                        </a>
			                    </li>
			                </ul>
			            </div>


			            <div class="col-sm-3 text-center">
			                
			                <div class="row">
			                	<div class="col-sm-12 text-center">
			                		<ul class="right">
					                    <li>
					                        <a href="#" target="_blank">
					                            <i class="fa fa-twitter"></i>
					                        </a>
					                    </li>

					                    <li>
					                        <a href="#" target="_blank">
					                            <i class="fa fa-facebook"></i>
					                        </a>
					                    </li>

					                    <li>
					                        <a href="#" target="_blank">
					                            <i class="fa fa-google"></i>
					                        </a>
					                    </li>
					                    
					                    <li>
					                        <a href="#" target="_blank">
					                             <i class="fa fa-vimeo"></i>
					                        </a>
					                    </li>
					                    
					                </ul>	


			                	</div>
			                </div>
			                
			                <div class="row">
			                	<div class="col-sm-12 text-center">
			                		<br><p>
			                			<span class="">&copy; Copyright
				                    		<span class="">{{ date('Y') }}</span> 
				                    		{{ config('app.name') }} - All Rights Reserved
				                    	</span>	
			                		</p>

			                	</div>
			                </div>
			            </div>
			        </div>			
				</div>
			</div>
		</div>
		

		<!--[if lte IE 8]><script src="js/ie/respond.min.js"></script><![endif]-->
		
		<script language = "Javascript" type = "text/javascript" src = "{{ my_asset('js/bootstrap-datepicker.min.js') }}"></script>
		<script language = "Javascript" type = "text/javascript" src = "{{ my_asset('js/scripts.js') }}"></script>
	</body>
</html>