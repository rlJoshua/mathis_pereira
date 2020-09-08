<!-- Header -->
<header id="header">
    <h1>Mathis Pereira</h1>
    <nav>
        <ul>
            @if(\Request::route()->getName() === 'login')
                <li><a href="{{ route('home') }}#intro">{{ __('Intro') }}</a></li>
            @else
                <li><a href="#intro">{{ __('Intro') }}</a></li>
            @endif
            @if(\Request::route()->getName() === 'login')
                <li><a href="{{ route('home') }}#one">{{ __('What I Do') }}</a></li>
            @else
                <li><a href="#one">{{ __('What I Do') }}</a></li>
            @endif
            @if(\Request::route()->getName() === 'login')
                <li><a href="{{ route('home') }}#two">{{ __('Who I Am') }}</a></li>
            @else
                <li><a href="#two">{{ __('Who I Am') }}</a></li>
            @endif
            @if(\Request::route()->getName() === 'login')
                <li><a href="{{ route('home') }}#work">{{ __('My Work') }}</a></li>
            @else
                <li><a href="#work">{{ __('My Work') }}</a></li>
            @endif
            @if(\Request::route()->getName() === 'login')
                <li><a href="{{ route('home') }}#contact">{{ __('Contact') }}</a></li>
            @else
                <li><a href="#contact">{{ __('Contact') }}</a></li>
            @endif

            @guest
                <li><a href="{{ route('login')}}">{{ __('Espace membre') }}</a></li>
            @else
                <li><a href="{{ route('profil')}}">{{ __('Espace personnel') }}</a></li>
                <li>
                    <a href="{{ route('logout')}}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
        </ul>
    </nav>
</header>
