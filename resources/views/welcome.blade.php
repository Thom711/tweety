<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
<div class="flex flex-col">
    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col justify-around h-full">
            <div>
                <h1 class="mb-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl justify-center">
                    <img src="/images/logo.svg" alt="Tweety">
                </h1>
                <ul class="flex flex-col space-y-2 sm:flex-row sm:flex-wrap sm:space-x-8 sm:space-y-0">
                    @auth
                        <li>
                            <a href="{{ url('/tweets') }}" class="bg-blue-600 text-white rounded py-2 px-4 hover:bg-blue-500">Home</a>
                        </li>
                    @else
                    <li>
                        <a href="{{ route('login') }}" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="bg-blue-600 text-white rounded py-2 px-4 hover:bg-blue-500">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>
