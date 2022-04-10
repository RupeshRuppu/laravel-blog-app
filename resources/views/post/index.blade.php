@extends('layout')

@section('all-posts')
    <div class="w-full h-full grid grid-cols-1 
    md:grid-cols-2 xl:grid-cols-3 p-10 gap-5">
        @foreach ($posts as $post)
            <div class="flex flex-col p-2 space-y-3 shadow shadow-slate-400 h-[300px]
            opacity-80 hover:opacity-100">
                <a href="{{ route('posts.show', ['post' => $post['id'] ]) }}" class="text-xl font-bold cursor-pointer">{{ $post['posttitle'] }}</a>
                <div class="h-[300px] overflow-y-hidden text-ellipsis text-justify">
                        {{ $post['postdata'] }}
                </div>
                @if($post['userid'] === \Session::get('user')[0])
                    <div class="flex justify-around items-center">
                        <a href="{{ route('posts.edit', ['post' => $post['id']]) }}" class="hover:bg-slate-200 cursor-pointer  px-4 py-1 rounded-md">EDIT</a>
                        <form method="POST" action="{{ route('posts.destroy', ['post' => $post['id']]) }}">
                            @csrf
                            @method('DELETE')
                            <button class="hover:bg-slate-200 cursor-pointer relative top-2  px-4 py-1 rounded-md" type="submit">DELETE</button>
                        </form>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endsection