<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <title>Document</title>
</head>
<body class="relative">
    @if(session('success'))
    <div id="success-message" class="absolute z-50 top-5 left-2/4 w-1/4 -translate-x-2/4 p-5 bg-green-700 text-white">
        {{ session('success') }}
    </div>
    @endif
    
    {{$slot}}
</body>
</html>