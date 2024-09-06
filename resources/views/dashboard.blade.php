<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-8">
            <div class="bg-white overflow-hidden shadow rounded-lg p-4">
                <div class="flex flex-row gap-4 items-center">
                    <div class="avatar rounded-full bg-black w-10 h-10 flex">
                        <p class="text-white font-bold text-2xl m-auto">{{ Auth::user()->name[0] }}</p>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-xl font-bold">Welcome, {{ Auth::user()->name }}</p>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();" class="text-sm text-gray-500">
                                {{ __('Sign Out') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
