<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>toWin</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
    <link rel="stylesheet" href="{{ url('css/theme.css') }}"/>
</head>
<body>
<div id="app">
    @include('nav')

    <div class="container" style="margin-top: 150px;">
        <router-view></router-view>
    </div>
</div>
</body>

<script src="{{ mix('js/app.js') }}"></script>
</html>
