<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    </head>
    <body class="relative w-screen h-screen bg-slate-50 flex flex-col justify-between p-5 space-y-5">
        <div>
            <h1 class="text-8xl text-indigo-400 font-bold text-center">Deep Dive</h1>
        </div>
        <div class="p-10 flex space-x-5 justify-center items-center">
            <div class="space-y-4">
                <h1 class="text-6xl">Spread your knowlege with writing blogs.</h1>
                <p class="text-indigo-300 font-bold">Don't focus on having a great blog. Focus on producing a blog that’s
                    great for your readers.</p>
            </div>
            <div class="flex">
                <img class="w-1/2 h-1/2 pointer-events-none" src="{{ asset('images/blog.svg') }}" alt="img1">
                <img class="w-1/2 h-1/2 pointer-events-none" src="{{ asset('images/3epn.svg') }}" alt="img2">
            </div>
        </div>
        <div class="flex justify-center items-center flex-1">
            <a class="bg-green-500 px-8 py-2 rounded-full text-white
            hover:bg-green-400" href="{{ route('auth.signin') }}">Get Started</a>
        </div>
    </body>
</html>