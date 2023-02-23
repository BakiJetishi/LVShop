<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <title>Document</title>
</head>
<body class="bg-gray-200 min-h-screen font-base relative">

    @if(session('success'))
    <div id="success-message" class="absolute z-50 top-5 left-2/4 w-1/4 -translate-x-2/4 p-5 bg-green-700 text-white">
        {{ session('success') }}
    </div>
    @endif

    <div class="flex flex-col md:flex-row">

        @include('dashboard.includes.sidebar')

        <div class="w-full md:flex-1">
            <nav class="hidden md:flex justify-between items-center bg-white p-4 shadow-md h-16">
                <div>
                    <div class="absolute top-2">
                    <input name='search' class="px-4 py-2 bg-gray-200 border border-gray-300 rounded focus:outline-none w-[500px]" type="text" placeholder="Search.."/>
                        <button class="p-3  text-white rounded-lg bg-orange-300 hover:bg-orange-400"><i class="fa-solid fa-magnifying-glass"></i> </button>
                </div>
                <div>
                    
                </div>
            </nav>
            <main>
                <div class="px-8 py-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    @vite('resources/js/app.js')
</body>
</html>
