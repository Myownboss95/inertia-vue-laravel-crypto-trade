<header id="navbar-spy" @class([
    'header header-2 header-light header-fixed' => request()->routeIs(
        'front.index'
    ),
    'header header-1 header-transparent header-bordered header-fixed' =>
        request()->routeIs('front.index') == false,
])>
    {{-- header header-1 header-transparent header-bordered header-fixed --}}
    @if (request()->routeIs('front.index') && false)
        <div id="top-bar" class="top-bar bitcoin-tracker-dark">
            <div class="container-fluid pr-0 pl-0">
                <div class="row clearfix">
                    <div class="topbarBitcoinTracker"></div>
                </div>
            </div>
        </div>
    @endif
    <nav id="primary-menu" class="navbar navbar-fixed-top">
        <div class="container">
            <div class="">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="logo" href="{{ url('/') }}">
                        <img class="logo-light" src="{{ logo() }}" alt="{{ config('app.name') }} Logo">
                        <img class="logo-dark" src="{{ logo() }}" alt="{{ config('app.name') }} Logo">
                    </a>
                </div>

                <div class="collapse navbar-collapse pull-right" id="navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">

                        <li class="active">
                            <a href="{{ route('front.index') }}">Home</a>
                        </li>

                        <li class="">
                            <a href="{{ route('front.about-us') }}">About Us</a>
                        </li>

                        <li class="">
                            <a href="{{ route('front.contact-us') }}">Contact Us</a>
                        </li>
                        <li class="">
                            <a href="{{ route('front.faqs') }}">Faqs</a>
                        </li>

                    </ul>
                    <div class="module module-consultation pull-left">
                        <a class="btn btn--secondary btn--bordered btn--rounded" href="{{ route('login') }}">Login</a>
                    </div>
                    <div class="module module-signup pull-left">
                        <a class="btn-popup" href="{{ route('register') }}">Sign Up</a>
                    </div>
                    <div class="module module-signup pull-left">
                        <div id="google_translate_element"></div>
                    </div>
                </div>

            </div>
        </div>

    </nav>
</header>
