<div class="w-full p-3 border-b border-dashed bg-slate-800 border-slate-700">
    <div class="container mx-auto">
        <div class="flex items-center justify-between">
            <!-- NavMenu -->
            <ul class="flex items-center justify-center gap-5">
                <li>
                    <a href="/" class="flex items-center text-lg font-semibold text-white">
                        <div class="text-center mr-2">
                            <img src="{{ asset('logo.png') }}" class="icon icon-tabler icon-tabler-brand-tabler"
                                width="40" height="40" viewBox="0 0 24 24" stroke-width="1.25"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        </div>
                        BBPKH CINAGARA
                    </a>
                </li>
                {{-- <li class="hidden lg:flex">
                    <a href="{{ route('home') }}"
                        class="text-sm font-semibold text-white flex items-center gap-2 {{ activeNav('home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon icon-tabler icon-tabler-home"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                        </svg>
                        Home
                    </a>
                </li>
                <li class="hidden lg:flex">
                    <a href="{{route('course.index') }}"
                        class="text-sm font-semibold text-white flex items-center gap-2 {{ activeNav('course.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 icon icon-tabler icon-tabler-device-laptop" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="3" y1="19" x2="21" y2="19"></line>
                            <rect x="5" y="6" width="14" height="10" rx="1"></rect>
                        </svg>
                        Course
                    </a>
                </li> --}}
            </ul>
            <!-- NavProfile -->
            <div class="items-center hidden gap-2 text-white md:flex">
                @guest
                    <a href="{{ route('login') }}"
                        class="flex items-center gap-2 px-4 py-2 text-xs font-semibold text-gray-200 border rounded-lg bg-slate-900 border-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon icon-tabler icon-tabler-user-check"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            <path d="M16 11l2 2l4 -4"></path>
                        </svg>
                        Sign In
                    </a>
                    <a href="{{ route('register') }}"
                        class="flex items-center gap-2 px-4 py-2 text-xs font-semibold text-white border rounded-lg bg-slate-700 border-slate-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon icon-tabler icon-tabler-user-plus"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            <path d="M16 11h6m-3 -3v6"></path>
                        </svg>
                        Sign Up
                    </a>
                @endguest
                @auth
                    <div class="relative" x-data="{ isOpen: false }">
                        <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false"
                            class="flex items-center gap-2 px-4 py-2 text-sm border rounded-lg bg-slate-900 border-slate-700">
                            <img src="{{ Auth::user()->avatar }}" alt="avatar"
                                class="w-5 h-5 border rounded-full border-slate-700">
                            {{ Auth::user()->name }}
                            <svg xmlns="http://www.w3.org/2000/svg" x-show="!isOpen"
                                class="w-4 h-4 icon icon-tabler icon-tabler-chevron-down" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" x-cloak x-show="isOpen"
                                class="w-4 h-4 icon icon-tabler icon-tabler-chevron-up" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="6 15 12 9 18 15"></polyline>
                            </svg>
                        </button>
                        <ul x-cloak x-show="isOpen" @click.away="isOpen = false"
                            class="absolute right-0 z-20 w-48 py-1 mt-2 overflow-hidden font-normal border rounded-lg shadow bg-slate-800 border-slate-700">
                            <li>
                                @role('admin')
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="flex items-center gap-2 p-3 text-sm font-semibold text-white rounded-lg hover:text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 icon icon-tabler icon-tabler-apps" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="4" y="4" width="6" height="6"
                                                rx="1"></rect>
                                            <rect x="4" y="14" width="6" height="6"
                                                rx="1"></rect>
                                            <rect x="14" y="14" width="6" height="6"
                                                rx="1"></rect>
                                            <line x1="14" y1="7" x2="20" y2="7"></line>
                                            <line x1="17" y1="4" x2="17" y2="10"></line>
                                        </svg>
                                        <span class="ml-2">Dashboard</span>
                                    </a>
                                @else
                                    <a href="{{ route('member.dashboard') }}"
                                        class="flex items-center gap-2 p-3 text-sm font-semibold text-white rounded-lg hover:text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 icon icon-tabler icon-tabler-apps" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="4" y="4" width="6" height="6"
                                                rx="1"></rect>
                                            <rect x="4" y="14" width="6" height="6"
                                                rx="1"></rect>
                                            <rect x="14" y="14" width="6" height="6"
                                                rx="1"></rect>
                                            <line x1="14" y1="7" x2="20" y2="7"></line>
                                            <line x1="17" y1="4" x2="17" y2="10"></line>
                                        </svg>
                                        <span class="ml-2">Dashboard</span>
                                    </a>
                                @endrole
                            </li>
                            <li class="border-b border-dashed border-slate-700">
                                @role('admin')
                                    <a href="{{ route('admin.user.profile') }}"
                                        class="flex items-center gap-2 p-3 text-sm font-semibold text-white rounded-lg hover:text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 icon icon-tabler icon-tabler-user-circle" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <circle cx="12" cy="10" r="3"></circle>
                                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                        </svg>
                                        <span class="ml-2">Profile</span>
                                    </a>
                                @else
                                    <a href="{{ route('member.profile.index') }}"
                                        class="flex items-center gap-2 p-3 text-sm font-semibold text-white rounded-lg hover:text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 icon icon-tabler icon-tabler-user-circle" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <circle cx="12" cy="10" r="3"></circle>
                                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                        </svg>
                                        <span class="ml-2">Profile</span>
                                    </a>
                                @endrole
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    class="flex items-center gap-2 p-3 text-sm font-semibold text-white rounded-lg hover:text-blue-500"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 icon icon-tabler icon-tabler-logout" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                                        </path>
                                        <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                                    </svg>
                                    <span class="ml-2">Logout</span>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
            <!-- Mobile Nav -->
            <div class="flex items-center gap-1 md:hidden">
                <div class="relative text-white" x-data="{ isOpen: false }">
                    @guest
                        <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false"
                            class="flex items-center gap-2 px-4 py-2 border rounded-lg bg-slate-900 border-slate-700">
                            <svg xmlns="http://www.w3.org/2000/svg" x-show="!isOpen"
                                class="w-5 h-5 icon icon-tabler icon-tabler-align-right" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="4" y1="6" x2="20" y2="6"></line>
                                <line x1="10" y1="12" x2="20" y2="12"></line>
                                <line x1="6" y1="18" x2="20" y2="18"></line>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" x-cloak x-show="isOpen"
                                class="w-5 h-5 icon icon-tabler icon-tabler-x" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    @endguest
                    @auth
                        <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false"
                            class="flex items-center gap-2 px-4 py-2 text-sm border rounded-lg bg-slate-900 border-slate-700">
                            <img src="{{ Auth::user()->avatar }}" alt="avatar"
                                class="w-5 h-5 border rounded-full border-slate-700">
                            {{ str()->limit(Auth::user()->name, 3) }}
                            <svg xmlns="http://www.w3.org/2000/svg" x-show="!isOpen"
                                class="w-4 h-4 icon icon-tabler icon-tabler-chevron-down" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" x-show="isOpen"
                                class="w-4 h-4 icon icon-tabler icon-tabler-chevron-up" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="6 15 12 9 18 15"></polyline>
                            </svg>
                        </button>
                    @endauth
                    <ul x-cloak x-show="isOpen" @click.away="isOpen = false"
                        class="absolute right-0 z-20 w-48 py-1 mt-2 overflow-hidden font-normal border rounded-lg shadow bg-slate-800 border-slate-700">
                        {{-- <li>
                            <a href="{{ route('home') }}"
                                class="p-3 rounded-lg text-sm font-semibold text-white flex items-center gap-2 hover:text-blue-500 {{ activeNav('home') }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 icon icon-tabler icon-tabler-home" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{route('course.index') }}"
                                class="p-3 rounded-lg text-sm font-semibold text-white flex items-center gap-2 hover:text-blue-500 {{ activeNav('course*') }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 icon icon-tabler icon-tabler-device-laptop" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="3" y1="19" x2="21" y2="19"></line>
                                    <rect x="5" y="6" width="14" height="10"
                                        rx="1"></rect>
                                </svg>
                                Course
                            </a>
                        </li> --}}
                        @guest
                            <li>
                                <a href="{{ route('login') }}"
                                    class="flex items-center gap-2 p-3 text-sm font-semibold text-white rounded-lg hover:text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 icon icon-tabler icon-tabler-user-check" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        <path d="M16 11l2 2l4 -4"></path>
                                    </svg>
                                    <span class="ml-2">Sign In</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}"
                                    class="flex items-center gap-2 p-3 text-sm font-semibold text-white rounded-lg hover:text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 icon icon-tabler icon-tabler-user-plus" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        <path d="M16 11h6m-3 -3v6"></path>
                                    </svg>
                                    <span class="ml-2">Sign Up</span>
                                </a>
                            </li>
                        @endguest
                        @auth
                            @role('admin')
                                <li class="border-t border-dashed border-slate-700">
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="flex items-center gap-2 p-3 text-sm font-semibold text-white rounded-lg hover:text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 icon icon-tabler icon-tabler-apps" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="4" y="4" width="6" height="6"
                                                rx="1"></rect>
                                            <rect x="4" y="14" width="6" height="6"
                                                rx="1"></rect>
                                            <rect x="14" y="14" width="6" height="6"
                                                rx="1"></rect>
                                            <line x1="14" y1="7" x2="20" y2="7"></line>
                                            <line x1="17" y1="4" x2="17" y2="10"></line>
                                        </svg>
                                        <span class="ml-2">Dashboard</span>
                                    </a>
                                </li>
                                <li class="border-b border-dashed border-slate-700">
                                    <a href="{{ route('admin.user.profile') }}"
                                        class="flex items-center gap-2 p-3 text-sm font-semibold text-white rounded-lg hover:text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 icon icon-tabler icon-tabler-user-circle" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <circle cx="12" cy="10" r="3"></circle>
                                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                        </svg>
                                        <span class="ml-2">Profile</span>
                                    </a>
                                </li>
                            @endrole
                            @role('member')
                                <li class="border-t border-dashed border-slate-700">
                                    <a href="{{ route('member.dashboard') }}"
                                        class="flex items-center gap-2 p-3 text-sm font-semibold text-white rounded-lg hover:text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 icon icon-tabler icon-tabler-apps" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="4" y="4" width="6" height="6"
                                                rx="1"></rect>
                                            <rect x="4" y="14" width="6" height="6"
                                                rx="1"></rect>
                                            <rect x="14" y="14" width="6" height="6"
                                                rx="1"></rect>
                                            <line x1="14" y1="7" x2="20" y2="7"></line>
                                            <line x1="17" y1="4" x2="17" y2="10"></line>
                                        </svg>
                                        <span class="ml-2">Dashboard</span>
                                    </a>
                                </li>
                                <li class="border-b border-dashed border-slate-700">
                                    <a href="{{ route('member.profile.index') }}"
                                        class="flex items-center gap-2 p-3 text-sm font-semibold text-white rounded-lg hover:text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 icon icon-tabler icon-tabler-user-circle" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <circle cx="12" cy="10" r="3"></circle>
                                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                        </svg>
                                        <span class="ml-2">Profile</span>
                                    </a>
                                </li>
                            @endrole
                            <li>
                                <a href="{{ route('logout') }}"
                                    class="flex items-center gap-2 p-3 text-sm font-semibold text-white rounded-lg hover:text-blue-500"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 icon icon-tabler icon-tabler-logout" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                                        </path>
                                        <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                                    </svg>
                                    <span class="ml-2">Logout</span>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
