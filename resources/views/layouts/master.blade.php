<!DOCTYPE html>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<html lang="en">
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c088001a (first)
=======
>>>>>>> d79d9e57 (first)
=======
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 9cec72d6 (first)
=======
<html lang="en">
>>>>>>> 8fc3049b (first)
=======
<html lang="en">
>>>>>>> 7e417e87 (first)
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        <title>Module Xot</title>

       {{-- Laravel Mix - CSS File --}}
       {{-- <link rel="stylesheet" href="{{ mix('css/xot.css') }}"> --}}
=======
        <title>Module UI</title>

       {{-- Laravel Vite - CSS File --}}
       {{-- {{ module_vite('build-ui', 'resources/assets/sass/app.scss') }} --}}
>>>>>>> a8f30311 (first)
=======
        <title>Module Job</title>

       {{-- Laravel Mix - CSS File --}}
       {{-- <link rel="stylesheet" href="{{ mix('css/job.css') }}"> --}}
>>>>>>> c088001a (first)
=======
        <title>Module Notify</title>

       {{-- Laravel Mix - CSS File --}}
       {{-- <link rel="stylesheet" href="{{ mix('css/notify.css') }}"> --}}
>>>>>>> d79d9e57 (first)
=======
        <title>Module User</title>

       {{-- Laravel Vite - CSS File --}}
       {{-- {{ module_vite('build-user', 'resources/assets/sass/app.scss') }} --}}
>>>>>>> 0d55b583 (first)
=======
        <title>Module Setting</title>

       {{-- Laravel Vite - CSS File --}}
       {{-- {{ module_vite('build-setting', 'resources/assets/sass/app.scss') }} --}}
>>>>>>> 9cec72d6 (first)
=======
        <title>Module Tenant</title>

       {{-- Laravel Mix - CSS File --}}
       {{-- <link rel="stylesheet" href="{{ mix('css/tenant.css') }}"> --}}
>>>>>>> 8fc3049b (first)
=======
        <title>Module Badge</title>

       {{-- Laravel Mix - CSS File --}}
       {{-- <link rel="stylesheet" href="{{ mix('css/badge.css') }}"> --}}
>>>>>>> 7e417e87 (first)

    </head>
    <body>
        @yield('content')

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/xot.js') }}"></script> --}}
=======
        {{-- Laravel Vite - JS File --}}
        {{-- {{ module_vite('build-ui', 'resources/assets/js/app.js') }} --}}
>>>>>>> a8f30311 (first)
    </body>
=======

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Module Lang</title>

    {{-- Laravel Mix - CSS File --}}
    {{-- <link rel="stylesheet" href="{{ mix('css/lang.css') }}"> --}}

=======
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Media Module - {{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Vite CSS --}}
    {{-- {{ module_vite('build-media', 'resources/assets/sass/app.scss') }} --}}
>>>>>>> c986cc10 (first)
</head>

<body>
    @yield('content')

<<<<<<< HEAD
    {{-- Laravel Mix - JS File --}}
    {{-- <script src="{{ mix('js/lang.js') }}"></script> --}}
</body>

>>>>>>> bbec4378 (first)
=======
        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/job.js') }}"></script> --}}
    </body>
>>>>>>> c088001a (first)
=======
        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/notify.js') }}"></script> --}}
    </body>
>>>>>>> d79d9e57 (first)
=======
        {{-- Laravel Vite - JS File --}}
        {{-- {{ module_vite('build-user', 'resources/assets/js/app.js') }} --}}
    </body>
>>>>>>> 0d55b583 (first)
=======
        {{-- Laravel Vite - JS File --}}
        {{-- {{ module_vite('build-setting', 'resources/assets/js/app.js') }} --}}
    </body>
>>>>>>> 9cec72d6 (first)
</html>
=======
    {{-- Vite JS --}}
    {{-- {{ module_vite('build-media', 'resources/assets/js/app.js') }} --}}
</body>
>>>>>>> c986cc10 (first)
=======
        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/tenant.js') }}"></script> --}}
    </body>
</html>
>>>>>>> 8fc3049b (first)
=======
        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/badge.js') }}"></script> --}}
    </body>
</html>
>>>>>>> 7e417e87 (first)
