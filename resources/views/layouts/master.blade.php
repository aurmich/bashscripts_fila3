<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c088001a (first)
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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

    </head>
    <body>
        @yield('content')

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

</head>

<body>
    @yield('content')

    {{-- Laravel Mix - JS File --}}
    {{-- <script src="{{ mix('js/lang.js') }}"></script> --}}
</body>

>>>>>>> bbec4378 (first)
=======
        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/job.js') }}"></script> --}}
    </body>
>>>>>>> c088001a (first)
</html>
