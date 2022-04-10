<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="relative w-screen h-screen overflow-x-hidden">
        <header class="relative w-screen h-20 bg-slate-400 shadow-lg shadow-slate-700 px-10 py-2 top-0 left-0">
            <nav class="p-3 flex justify-between items-center">
                <div class="flex items-center justify-center space-x-6">
                    <h1 class="text-2xl font-bold">Deep Dive</h1>
                    <form action="find-post-by-search" method="post" class="relative top-2 space-x-2 flex justify-center items-center">
                        @csrf
                        <input type="text" name="search" id="search"
                        value="{{ old('search') }}"
                        class="px-3 py-1 rounded-full w-56 focus:w-60 transition-all duration-300">
                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass hover:scale-125 transition-all duration-300 cursor-pointer"></i>
                        </button>
                    </form>
                </div>
                <div class="flex space-x-8 justify-center items-center">
                    <a href="{{ route('posts.create') }}" class="text-lg cursor-pointer">Create Post</a>
                    <a href="/my-posts" class="text-lg cursor-pointer">My Posts</a>
                    <a href="/user-details" class="text-xl">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </div>
            </nav>
        </header>
        <section class="relative w-screen py-6">
            @yield('all-posts')
        </section>
    </body>
</html>