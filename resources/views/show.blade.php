@extends('layouts.lj')
@section('content')
    <div class="flex flex-col items-center justify-center">
        <h1 class="mt-10 mb-3 text-3xl font-bold">{{ $post->title }}</h1>
        <div class="text-lg prose text-gray-600 lg:prose-xl">{!! $post->content !!}</div>
    </div>

    <div class="flex flex-row items-center justify-center ">
        <a href="{{ url()->previous() }}" class="px-4 py-2 mt-4 text-white bg-red-500 rounded">Go back</a>
    </div>
@endsection
