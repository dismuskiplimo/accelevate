<nav class="">
    <div class="nav-bar nav--absolute">
        <div class="nav-module logo-module left">
            <a href="{{ route('homepage') }}">
                <img class="logo logo-light" alt="logo" src="{{ asset('img/logo-light.png') }}" />
                <img class="logo logo-dark" alt="logo" src="{{ asset('img/logo-dark.png') }}" />
            </a>
        </div>
        <div class="nav-module menu-module left">
            <ul class="menu">
                <li>
                    <a href="{{ route('homepage') }}">
                        Home
                    </a>
                   
                </li>
                
            </ul>
        </div>

        <div class="nav-module menu-module right" style = "margin-right: 25px;">
            <ul class="menu">
                <li>
                    <a href="{{ route('register') }}">
                        Register
                    </a> 

                    
                </li>
                    
                <li>
                    <a href="{{ route('login') }}">
                        Login
                    </a> 
                </li>

                @if(auth()->check())
                    <li>
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a> 
                    </li>
                @else

                @endif

                
                
            </ul>
        </div>       
    </div>
    <!--end nav bar-->
    <div class="nav-mobile-toggle visible-sm visible-xs">
        <i class="icon-Align-Right icon icon--sm"></i>
    </div>
</nav>