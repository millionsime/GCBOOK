<style>
  /* The navigation bar */
.navbar {
  overflow: hidden;
  background-color: #021123;
  position: fixed; /* Set the navbar to fixed position */
  top: 0; /* Position the navbar at the top of the page */
  width: 100%; /* Full width */
  height: 10%;
  padding-right: 3%;
  padding-top: 1%;
  align-content: center;
}

/* Links inside the navbar */
.navbar a {
  float: left;
  display: block;
  
  text-align: center;
  padding: 12px 14px;
  text-decoration: none;
}

/* Change background on mouse-over */
.navbar a:hover {
  
}

/* Main content */
.main {
  margin-top: 20px; /* Add a top margin to avoid content overlay */
}
</style>
<header class="header-main dark">
  <div class="navbar">  
  <nav>
      {{-- <a href="{{ url('/home') }}" class="logo" rel="home"><svg xmlns="{{ asset('opal/media/favicon.png') }}" width="24" height="24" viewBox="0 0 24 24"><path d="M7.335 1.023l2.462.434a1 1 0 0 1 .811 1.159L8.004 17.388a2 2 0 0 1-2.317 1.622l-3.94-.694a1 1 0 0 1-.81-1.159L3.28 3.862a3.5 3.5 0 0 1 4.054-2.839zm7.039 3.272l7.878 1.39a1 1 0 0 1 .812 1.158l-1.997 11.325a5.5 5.5 0 0 1-6.372 4.461l-4.431-.78a1 1 0 0 1-.812-1.16l2.605-14.771a2 2 0 0 1 2.317-1.623z" fill="currentColor"/></svg> --}}
        <span>Ethio Exit-Ex</span></a>
      <div class="nav-toggle"></div>
        <ul class="inline">
            <li><a href="{{ url('/home') }}" class="active">Home</a></li>
           
          
            {{-- <li><a href="{{ route('about') }}">About</a></li> --}}
         </ul>
        @guest
          
        <ul class="inline right">
        @if (Route::has('login'))
            <li>
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li>
                <a  href="{{ route('signup') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
    <ul class="inline right">
        <li>
            <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
               <small>{{ Auth::user()->name }}</small>
            </a>
        </li>
        <li>
        <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
        </li>
    </ul>
    @endguest
      </ul>
    </nav>
  </div>
  
</header>