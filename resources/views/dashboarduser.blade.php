<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('User management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (Auth::user()->is_admin)
                        <h2 class="mt-5 mb-1 text-2xl font-bold">User Management</h2>
                        @php
                            $users = App\Models\User::all();
                        @endphp

                        @foreach ($users as $user)
                            <div class="flex items-center justify-between">
                                <p class="text-xl">{{ $user->name }}</p>
                                <div>
                                    @if ($user->is_admin)
                                        <span
                                            class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-100 text-red-800">
                                            Admin
                                        </span>
                                    @endif
                                    @if ($user->is_writer)
                                        <span
                                            class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-100 text-red-800">
                                            Writer
                                        </span>
                                    @endif
                                </div>
                                <div class="flex items-center">
                                    @if (!$user->is_admin)
                                        <form action="{{ route('user.makeadmin') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="px-4 py-2 mr-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Make
                                                Admin</button>
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        </form>
                                    @else
                                        <form action="{{ route('user.removeadmin') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="px-4 py-2 mr-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Remove
                                                Admin</button>
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        </form>
                                    @endif
                                    @if (!$user->is_writer)
                                        <form action="{{ route('user.makewriter') }}" method="POST">
                                            @csrf

                                            <button type="submit"
                                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Make
                                                Writer</button>
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        </form>
                                    @else
                                        <form action="{{ route('user.removewriter') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Remove
                                                Writer</button>
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
