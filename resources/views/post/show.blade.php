<html>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <body class="grid place-items-center w-screen h-screen">
        <div class="w-1/2 h-1/2">
            <h1 class="text-xl font-bold cursor-pointer">{{ $post['posttitle'] }}</h1>
            <div class="h-[300px] overflow-y-hidden text-ellipsis text-justify">
                    {{ $post['postdata'] }}
            </div>
            {{-- @if($post['userid'] === \Session::get('user')[0])
                <div class="flex justify-around items-center">
                    <a href="{{ route('posts.edit', ['post' => $post['id']]) }}" class="hover:bg-slate-200  px-4 py-1 rounded-md">EDIT</a>
                    <a href="{{ route('posts.destroy', ['post' => $post['id']]) }}" class="hover:bg-slate-200  px-4 py-1 rounded-md">DELETE</a>
                </div>
            @endif --}}
        </div>
    </body>
</html>