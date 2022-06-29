
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="/"><img class="img-fluid" alt="4ns" src="{{asset('frontend-lib/images/jt_logo.jpeg')}}" style="width:60px; height:60px;" ></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">


        <li><a href="/" class="active">Home</a></li>
        <li><a href="{{URL::to('/services')}}" target="_blank">Services</a></li>
        <li><a href="{{URL::to('/about_us')}}" target="_blank">About Us</a></li>
        <li><a href="{{URL::to('/contact_us')}}" target="_blank">Contact Us</a></li>

    </ul>

    @if (Auth::guest())
    <div class="form-inline">
        <a class="btn btn-danger my-2 my-sm-0" href="{{ route('login') }}">
            {{ __('Login') }}
        </a>

    </div>
    @else
    <div class="form-inline">
        <a class="btn btn-danger my-2 my-sm-0" href="{{ route('logout') }}"
           onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="{{route('sliders.index')}}" class="btn btn-primary">Dashboard</a>
    </div>
    @endif




    </div> <!-- row -->
</nav>


