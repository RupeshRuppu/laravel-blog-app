<html>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <body class="w-screen h-screen grid place-items-center bg-gradient-to-br from-slate-700">
       <section class="w-[500px] h-[400px] bg-slate-300 grid place-items-center
       shadow-md shadow-slate-400">
        @if (!Session::has('reset-inputs'))
           <form action="{{ route('auth.set-reset-input-cookie') }}" method="post"
           class="space-y-3">
            @csrf
                <div class="space-x-3 p-3">
                    <label for="email">Enter Email</label>
                    <input type="text" name="email" id="email" class="input w-72 {{ Session::has('email-error') ? "ring-2 ring-offset-2 ring-red-500" : "" }} ">
                </div>
                <div class="flex justify-center">
                    <input type="submit" value="Get Key" name="submit" class="px-6 py-2 bg-green-500 rounded-md hover:bg-green-400
                    cursor-pointer">
                </div>
           </form>
        @else
            <form action="{{ route('auth.set-reset-input-cookie') }}" method="post" class="space-y-3">
            @csrf
                <div class="flex justify-center space-x-3 p-3">
                    <label for="email">Enter Email</label>
                    <input type="text" name="email" id="email" class="input w-72" value={{ Session::get('reset-inputs') }}>
                </div>
                <div class="flex justify-center space-x-3 p-3">
                    <label for="secretkey">Secret Key</label>
                    <input type="text" name="key" id="secretkey" class="input w-72" }}>
                </div>
                <div class="flex justify-center space-x-3 p-3">
                    <label for="secretkey">Password</label>
                    <input type="password" name="password" id="secretkey" class="input w-72 {{ Session::has('key-error') ? "ring-2 ring-offset-2 ring-red-500" : "" }}" }}>
                </div>
                <div class="flex justify-center">
                    <input type="submit" value="Update Password" name="submit" class="px-6 py-2 bg-green-500 rounded-md hover:bg-green-400
                    cursor-pointer">
                </div>
            </form>
        @endif
       </section>
    </body>
</html>