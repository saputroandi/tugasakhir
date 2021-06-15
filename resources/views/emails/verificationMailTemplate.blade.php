<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <h3>{{ $title }}</h3>
    <p>{{ $note }}</p>
    <p>{{ $note2 ? $note2 : "" }}</p>
    <p>Thank you</p>
</body>
</html>