<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-blue-900 p-6">
            <div class="container mx-auto">
                
                <nav class="flex items-center">
                    <div class="mr-4">
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                    
                    <ul class="ml-auto text-white text-md flex items-center">
                      @guest
                    
                        <li class="ml-2">
                             <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                            
                        </li>

                      

                        @if (Route::has('register'))
                          <li class="ml-2">
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                             </li>
                        @endif
                    @else

                        <li class="ml-2">
                        <span>{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                    </ul>
                </nav>
            </div>
        </header>

        @yield('content')
    </div>
    <script src="{{ url('category/js/jquery.nestable.js') }}"></script>

        <script src="{{ url('category/js/style.js') }}"></script>
    @livewireScripts
</body>
</html>
