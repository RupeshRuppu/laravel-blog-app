<html>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <body class="grid place-items-center">
        <div class="border-2 border-black  w-1/2 h-1/2 relative p-2">
            <form action="{{ route('posts.store') }}" method="POST" class="relative flex-col flex w-full h-full">
                @csrf
                <div class="w-full h-30 flex justify-around items-center">
                    <div class="flex space-x-3">
                        <label for="ptitle" class="text-red-500">Post Title</label>
                        <input type="text" class="outline-none bg-slate-100 p-2 rounded-md" name="ptitle" id="ptitle">
                    </div>
                    <div class="flex space-x-3">
                        <label for="pcategory" class="text-red-500">Post Category</label>
                        <input type="text" class="outline-none bg-slate-100 p-2 rounded-md" name="pcategory" id="pcategory">
                    </div>
                </div>
                <div class="flex-1 relative p-5">
                    <label for="pdata" class="text-red-500 underline-offset-2 underline">Post Data</label>
                    <textarea class="w-full h-full outline-none p-5" name="pdata" id="pdata"></textarea>
                </div>
                <button type="submit" class="px-4 py-2 bg-green-400 rounded-md">SUBMIT</button>
            </form>
        </div> 
    </body>
</html>