@extends('layouts.lj')
@section('content')
    {{-- Show a heading with app.name, a description and than all journal posts --}}
    <div class="flex flex-col items-center justify-center">
        <h1 class="mt-10 text-5xl font-bold mb-3">{{ config('app.name') }}</h1>
        <p class="text-xl text-gray-600">A simple journaling app</p>

        <div class="mt-4">
            @foreach ($posts as $post)
                <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                    <a href="/post/{{ $post->id }}">
                        <h2 class="text-2xl font-bold">{{ $post->title }}</h2>
                    </a>
                    <p class="text-gray-600">
                        {{ Str::limit(strip_tags($post->content), 100) }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
