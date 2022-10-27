@extends('layouts.lj')
@section('content')
    {{-- Show a heading with app.name, a description and a go-to journal button --}}
    <div class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-5xl font-bold mb-3">{{ config('app.name') }}</h1>
        <p class="text-xl text-gray-600">A simple journaling app</p>
        <a href="{{ route('journal.list') }}" class="mt-4 px-4 py-2 bg-red-500 text-white rounded">Go to journal</a>
    </div>
@endsection
