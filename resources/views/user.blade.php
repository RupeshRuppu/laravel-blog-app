<html>    
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="w-screen h-screen grid place-items-center bg-gradient-to-br from-slate-600">
        <div class="flex flex-col bg-slate-500 p-20 shadow-2xl shadow-slate-400 space-y-4">
            <h1 class="text-xl font-bold">User Unique Id : 
                <span class="text-white">
                    {{ $userid }}
                </span>
            </h1>
            <h1 class="text-xl font-bold">User Email Id : 
                <span class="text-white">
                    {{ $useremail }}
                </span>
            </h1>
            <h1 class="text-xl font-bold">User Name : 
                <span class="text-white">
                    {{ $username }}
                </span>
            </h1>
            <div class="flex justify-around">
                <a href="/logout" class="text-center text-2xl hover:text-red-400">
                    Logout
                </a>
                <a href="/delete-account" class="text-center text-2xl hover:text-red-400">
                    Delete Account
                </a>
            </div>
        </div>
    </body>
</html>
