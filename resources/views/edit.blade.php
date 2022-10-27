@extends('layouts.lj')
@section('content')
    <div class="flex flex-col items-center justify-center">
        <h1 class="mt-10 mb-3 text-3xl font-bold">Edit post</h1>
        <form action="{{ route('journal.putedit', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col items-center justify-center">
                <label for="title" class="text-lg text-gray-600">Title</label>
                <input type="text" name="title" id="title" class="px-4 py-2 mt-2 border rounded"
                    value="{{ $post->title }}">
            </div>
            <div class="flex flex-col items-center justify-center prose lg:prose-xl">
                <label for="content" class="mt-4 text-lg text-gray-600">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="px-4 py-2 mt-2 border rounded">{{ $post->content }}</textarea>
            </div>
            <div class="flex flex-col items-center justify-center">
                <button type="submit" class="px-4 py-2 mt-4 text-white bg-red-500 rounded">Update</button>
            </div>
        </form>
        <div class="flex flex-col items-center justify-center">
            <a href="{{ url()->previous() }}" class="px-4 py-2 mt-4 text-white bg-red-500 rounded">Go back</a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#content').summernote({
                placeholder: 'Write your journal post here...',
                tabsize: 2,
                height: 565,
                width: 800
            });
        });
    </script>
@endsection
