<!-- Header -->
<header class="sticky top-0 z-50 bg-white/80 dark:bg-gray-800/80 backdrop-blur-md shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <i class="fas fa-newspaper text-2xl text-primary-600 dark:text-primary-400"></i>
                <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800 dark:text-white">
                    E-<span class="text-primary-600 dark:text-primary-400">Koran</span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}"
                    class="font-medium hover:text-primary-600 dark:hover:text-primary-400 transition">Beranda</a>
                @foreach ($categories as $category)
                    <a href="{{ route('categories.show', $category->slug) }}"
                        class="font-medium hover:text-primary-600 dark:hover:text-primary-400 transition">{{ $category->name }}</a>
                @endforeach
            </nav>

            <!-- Right Side -->
            <div class="flex items-center space-x-4">
                <!-- Search -->
                {{-- <button class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <i class="fas fa-search text-gray-600 dark:text-gray-300"></i>
                </button> --}}

                <!-- Dark Mode Toggle -->
                <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <i class="fas fa-moon text-gray-600 dark:text-gray-300 hidden dark:inline"></i>
                    <i class="fas fa-sun text-gray-600 dark:text-gray-300 dark:hidden"></i>
                </button>

                <!-- Login Button -->
                <a href="{{ route('login') }}"
                    class="hidden md:inline-block px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-md transition">Login
                    Admin</a>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button"
                    class="md:hidden p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <i class="fas fa-bars text-gray-600 dark:text-gray-300"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 pb-2">
            <div class="flex flex-col space-y-3">
                <a href="{{ route('home') }}"
                    class="font-medium hover:text-primary-600 dark:hover:text-primary-400 transition">Beranda</a>
                @foreach ($categories as $category)
                    <a href="{{ route('categories.show', $category->slug) }}"
                        class="font-medium hover:text-primary-600 dark:hover:text-primary-400 transition">{{ $category->name }}</a>
                @endforeach
                <a href="{{ route('login') }}"
                    class="mt-2 px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-md text-center transition">Login
                    Admin</a>
            </div>
        </div>
    </div>
</header>
