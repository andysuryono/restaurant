<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="logo" href="{{ url('/admin') }}">
                <h5 style="color: #df0031;">&nbsp;&nbsp;AdminPanel </h5>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
<!-- 
                <a class="logo" href="{{ url('/admin') }}">
                <h4 style="color: #df0031;"> AdminPanel </h4> -->
            </a>

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right"">
                 <li><a href="{{ url('/') }}" target="_blank">Kitchen Food</a></li>
                 <!-- Authentication Links -->
                 @if (Auth::guest())
                 <li><a href="{{ url('/login') }}"></a></li>
                 <li><a href="{{ url('/register') }}"></a></li>
                 @else
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="portfolio">
    <div id="filters" class="sixteen columns">
        <ul style="padding:0px 0px 0px 0px">
            <li><a href="{{route('sliders')}}"><h5>Sliders</h5></a></li>
            <li><a  href="{{route('pages')}}"><h5>Pages</h5></a></li>
            <!-- <li><a  href="{{route('subpages')}}"><h5>Subpages</h5></a></li> -->
            <li><a href="{{route('services')}}"><h5>Services</h5></a></li>
            <li><a href="{{route('prices')}}"><h5>Menu</h5></a></li>
            <li><a  href="{{route('portfolios')}}"><h5>Gallery</h5></a></li>
            <li><a  href="{{route('stats')}}"><h5>Stats</h5></a></li>
            <li><a  href="{{route('peoples')}}"><h5>Chefs</h5></a></li>
            <li><a href="{{route('clients')}}"><h5>Feedback</h5></a></li>
            
        </ul>
    </div>
</div>




