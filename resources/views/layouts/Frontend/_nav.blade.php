<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            @foreach ($setting->media as $media)
                @if ($media->name == 'logo')
                    <img src="{{ asset('storage/'.$media->path) }}" alt="..."  width="50" height="150" style="border-radius: 50%">
                @endif
            @endforeach
            </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('service') }}">{{ __('front.services') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('portfolio') }}">{{ __('front.portfolio') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">{{ __('front.about') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('team') }}">{{ __('front.team') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">{{ __('front.contact_us') }}</a></li>
            </ul>
        </div>
    </div>
</nav>
