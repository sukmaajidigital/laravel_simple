<header class="bg-white border-b h-16 items-center justify-end flex">
    <div class="flex max-w-7xl justify-end px-6">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <div class="flex flex-row gap-1 justify-center items-center cursor-pointer">
                    <div class="avatar rounded-full bg-black w-10 h-10 flex">
                        <p class="text-white font-bold text-2xl m-auto">{{ Auth::user()->name[0] }}</p>
                    </div>
                    <div class="ms-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</header>
