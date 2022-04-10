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
        bg-gradient-to-tl from-slate-500">
        <section class="grid place-items-center">
            <form action="{{ route('auth.checkUser') }}" method="post" class="flex flex-col items-center space-y-5" autocomplete="off">
                @csrf
                <h1 class="text-3xl md:text-4xl text-red-400 font-bold">User Login</h1>
                <hr class="bg-slate-500">
                <div class="flex flex-col items-center space-y-4">
                    <div class="space-x-3">
                        <i class="fa-solid fa-envelope"></i>
                        <input class="input @error('email') ring-2 ring-offset-2 ring-red-500 @enderror" type="text" name="email" id="email" placeholder="email"
                        value="{{ old('email') }}">
                    </div>
                    <div class="space-x-3">
                        <i class="fa-solid fa-lock"></i>
                        <input class="input @error('password') ring-2 ring-offset-2 ring-red-500 @enderror" type="password" name="password" id="password" placeholder="*********">
                        @if(Session::get('error')) 
                            <div class="text-red-800 text-center">
                               {{ Session::get('error') }}
                            </div>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn text-white">Sign In</button>
                <span>Dont't have an account ? Please <a href="/auth/signup" class="text-red-500 font-bold">sign up</a></span>
            </form>
            <div class="font-bold">
                <span>forgot password ? Please <a href="{{ route('auth.reset-password') }}" class="text-white font-semibold text-xl">click</a> here to reset!</span>
            </div>
        </section>
    </body>
</html>