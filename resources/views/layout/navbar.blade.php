<header>
    <nav class="bg-blue-700 border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 text-white">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="https://flowbite.com" class="flex items-center">
                <svg class="w-10 h-10 mr-3 p-1 bg-white rounded-full text-blue-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M10.915 2.345a2 2 0 0 1 2.17 0l7 4.52A2 2 0 0 1 21 8.544V9.5a1.5 1.5 0 0 1-1.5 1.5H19v6h1a1 1 0 1 1 0 2H4a1 1 0 1 1 0-2h1v-6h-.5A1.5 1.5 0 0 1 3 9.5v-.955a2 2 0 0 1 .915-1.68l7-4.52ZM17 17v-6h-2v6h2Zm-6-6h2v6h-2v-6Zm-2 6v-6H7v6h2Z" clip-rule="evenodd"/>
                    <path d="M2 21a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1Z"/>
                </svg>
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">e-RealEstate</span>
            </a>
                    <div class="block lg:hidden">
                        <button class="navbar-burger flex items-center text-white p-3">
                            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Menu</title>
                                <path d="M0 3h20v2H0zm0 6h20v2H0zm0 6h20v2H0z" />
                            </svg>
                        </button>
                    </div>
                    <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
                        <ul class="lg:flex items-center justify-between text-base text-gray-300 pt-4 lg:pt-0">
                            <li class="nav-item {{ Route::currentRouteNamed('prediction') ? 'active' : '' }}">
                                <a href="{{ route('prediction') }}" class="block py-2 px-4 hover:bg-gray-700 rounded-lg">Prediksi</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed('history') ? 'active' : '' }}">
                                <a href="{{ route('history') }}" class="block py-2 px-4 hover:bg-gray-700 rounded-lg">History</a>
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('logout') }}"
                    class="text-white dark:text-white hover:bg-gray-50 hover:text-blue-700 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Logout
            </a>
        </div>
    </nav>
</header>
