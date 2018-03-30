<nav id="topNav" class="navbar navbar-default main-menu">
    <div class="container">
        <button class="navbar-toggler hidden-md-up pull-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            ☰ 
            <!-- &equiv; -->
        </button> 
		 <a class="navbar-brand page-scroll" href="#"><img class="logo" id="logo" src="{{ asset('assets') }}/images/logo.png" alt="logo"></a>
         @if(isset($menu))
         <div class="collapse navbar-toggleable-sm" id="collapsingNavbar">
            <ul class="nav navbar-nav">
                @foreach($menu as $item)
                <li><a href="#{{ $item['alias'] }} {{ Request::is($item['alias']) ? 'class="active"' : '' }}"  >{{ $item['title'] }}</a></li>
                 {{-- classActivePath($item['alias']) --}}
                @endforeach
            </ul> 
        </div>
         @endif
    </div>
</nav>
<!-- 
@if(session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif -->