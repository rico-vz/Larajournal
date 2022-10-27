<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- If not a writer or an admin using is_, log  them out --}}
                    @if (Auth::user()->is_writer || Auth::user()->is_admin)
                        Welcome to the dashboard!
                    @else
                        <script>
                            window.location = "{{ route('journal.index') }}";
                        </script>
                    @endif

                    <div>
                        <a href="{{ route('journal.create') }}">
                            <button
                                class="px-4 py-2 mt-4 text-sm font-medium text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue">
                                Create Post
                            </button>
                        </a>

                    </div>

                    @if (Auth::user()->is_admin)
                        <h2 class="mt-5 mb-1 text-2xl font-bold">Posts</h2>
                        @php
                            $posts = App\Models\JournalPost::all();
                        @endphp
                        <table class="divide-gray-200 ">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Author
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Updated
                                    </th>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Actions
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $post->id }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $post->title }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $post->author_id }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $post->updated_at }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex flex-row">
                                                <a href="{{ route('journal.show', $post->id) }}">
                                                    <button
                                                        class="px-4 py-2 mt-4 mr-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue">
                                                        View
                                                    </button>
                                                </a>
                                                <a href="{{ route('journal.edit', $post->id) }}">
                                                    <button
                                                        class="px-4 py-2 mt-4 mr-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue">
                                                        Edit
                                                    </button>
                                                </a>
                                                <form action="{{ route('journal.destroy', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="px-4 py-2 mt-4 text-sm font-medium text-white transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:border-red-700 focus:shadow-outline-red">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
