<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-12 justify-between">
            <div class="flex">
                <!-- Logo -->
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>


                @if (Auth::user())
                    <div class="hidden space-x-8 sm:-my-px sm:ml-24 sm:flex">
                        <x-nav-link
                            :href="route('dashboard')"
                            :active="request()->routeIs('dashboard')"
                        >
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link
                            :href="route('languages')"
                            :active="request()->routeIs('languages')"
                        >
                            {{ __('Languages') }}
                        </x-nav-link>
                        <x-nav-link
                            :href="route('interests')"
                            :active="request()->routeIs('interests')"
                        >
                            {{ __('Interests') }}
                        </x-nav-link>
                    </div>
                @endif
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-24 sm:flex">
                    <x-nav-link
                        :href="route('form')"
                        :active="request()->routeIs('form')"
                    >
                        {{ __('Form') }}
                    </x-nav-link>
                    <x-nav-link
                        href="http://localhost:8025/"
                        target="_blank"
                    >
                        {{ __('MailHog') }}
                    </x-nav-link>
                    <x-nav-link
                        :href="route('readme')"
                        :active="request()->routeIs('readme')"
                    >
                        {{ __('Readme') }}
                    </x-nav-link>
                    <x-nav-link
                        href="/Johan-Bothma-CV.pdf"
                        target="_blank"
                    >
                        {{ __('CV') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            @if (Auth::user())
                <div class="hidden sm:ml-6 sm:flex sm:items-center">

                    <!-- Authentication -->
                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >
                        @csrf

                        <x-primary-button
                            :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                        >
                            {{ __('Log Out') }}
                        </x-primary-button>
                    </form>
                </div>
            @else
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <x-primary-button>
                        <a href='/login'>
                            Log In
                        </a>
                    </x-primary-button>
                </div>
            @endif

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                >
                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            :class="{ 'hidden': open, 'inline-flex': !open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path
                            :class="{ 'hidden': !open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div
        :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden"
    >
        <div class="space-y-1 pt-8 pb-3">
            @if (Auth::user())
                <x-responsive-nav-link
                    :href="route('dashboard')"
                    :active="request()->routeIs('dashboard')"
                >
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @endif
            <x-responsive-nav-link
                :href="route('form')"
                :active="request()->routeIs('form')"
            >
                {{ __('Form') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link
                href="http://localhost:8025/"
                target="_blank"
            >
                {{ __('MailHog') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link
                :href="route('readme')"
                :active="request()->routeIs('readme')"
            >
                {{ __('Readme') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link
                href="/Johan-Bothma-CV.pdf"
                target="_blank"
            >
                {{ __('CV') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="border-t border-gray-200 pt-4 pl-2 pb-1">
            <div class="mt-3 space-y-1">
                @if (Auth::user())
                    <!-- Authentication -->
                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >
                        @csrf

                        <x-primary-button
                            :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();"
                        >
                            {{ __('Log Out') }}
                        </x-primary-button>

                    </form>
                @else
                    <x-primary-button>
                        <a href='/login'>
                            Log In
                        </a>
                    </x-primary-button>
                @endif
            </div>
        </div>

    </div>
</nav>
