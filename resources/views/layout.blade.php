<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{ $title ?? config('app.name') }}</title>
</head>
<body class="bg-buatbody">

    <nav>
        @include('include.navbar')
    </nav>
    
    <div class="">
        @yield("content")
    </div>

    @include('include.script')
</body>
</html>