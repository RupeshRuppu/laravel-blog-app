<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            input:focus::placeholder {
                color: transparent;
            }
        </style>
    </head>
    <body class="relative w-screen h-screen grid place-items-center
        bg-gradient-to-br from-slate-500">
        <section class="grid place-items-center">
            @if(Session::get('error'))
                <h1 class="text-rose-600">{{ Session::get('error') }}</h1>
            @endif
            <form action="{{ route('auth.createUser') }}" method="post" class="flex flex-col items-center space-y-5" autocomplete="off">
                @csrf
                <h1 class="text-3xl md:text-4xl text-red-500 font-bold">User Register</h1>
                <hr class="bg-slate-500">
                <div class="flex flex-col items-center space-y-6">
                    <div class="space-x-3">
                        <i class="fa-solid fa-user"></i>
                        <input class="input @error('fullname') ring-2 ring-offset-2 ring-red-500 @enderror" type="text" name="fullname" id="fullname" placeholder="fullname"
                        value="{{ old('fullname') }}">
                    </div>
                    <div class="space-x-3">
                        <i class="fa-solid fa-envelope"></i>
                        <input class="input @error('email') ring-2 ring-offset-2 ring-red-500 @enderror" type="text" name="email" id="email" placeholder="email"
                        value="{{ old('email') }}" />
                    </div>
                    <div class="space-x-3">
                        <i class="fa-solid fa-lock"></i>
                        <input class="input @error('password') ring-2 ring-offset-2 ring-red-500 @enderror" type="password" name="password" id="password" placeholder="********">
                    </div>
                </div>
                <button type="submit" class="btn bg-green-400 hover:bg-green-500 text-white">Sign Up</button>
            </form>
            <span>Already have an account ? Please <a href="/auth/signin" class="text-red-500 font-bold">sign in</a></span>
        </section>
    </body>
</html>