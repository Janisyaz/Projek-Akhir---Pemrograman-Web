<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | E-Koran Digital</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: "#f0f9ff",
                            100: "#e0f2fe",
                            200: "#bae6fd",
                            300: "#7dd3fc",
                            400: "#38bdf8",
                            500: "#0ea5e9",
                            600: "#0284c7",
                            700: "#0369a1",
                            800: "#075985",
                            900: "#0c4a6e",
                        },
                        secondary: {
                            50: "#f5f3ff",
                            100: "#ede9fe",
                            200: "#ddd6fe",
                            300: "#c4b5fd",
                            400: "#a78bfa",
                            500: "#8b5cf6",
                            600: "#7c3aed",
                            700: "#6d28d9",
                            800: "#5b21b6",
                            900: "#4c1d95",
                        },
                    },
                },
            },
        };
    </script>
    <style>
        .news-card:hover .news-title {
            color: #0ea5e9;
        }

        .dark .news-card:hover .news-title {
            color: #7dd3fc;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-gray-200 transition-colors duration-300">
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Back to Top Button -->
    <button id="back-to-top"
        class="fixed bottom-6 right-6 p-3 bg-primary-600 text-white rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-primary-700">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Dark Mode Toggle
        const themeToggle = document.getElementById("theme-toggle");
        const html = document.documentElement;

        themeToggle.addEventListener("click", () => {
            html.classList.toggle("dark");
            localStorage.setItem("theme", html.classList.contains("dark") ? "dark" : "light");
        });

        // Check for saved theme preference
        if (
            localStorage.getItem("theme") === "dark" ||
            (!localStorage.getItem("theme") &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            html.classList.add("dark");
        }

        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById("mobile-menu-button");
        const mobileMenu = document.getElementById("mobile-menu");

        mobileMenuButton.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });

        // Back to Top Button
        const backToTopButton = document.getElementById("back-to-top");

        window.addEventListener("scroll", () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove("opacity-0", "invisible");
                backToTopButton.classList.add("opacity-100", "visible");
            } else {
                backToTopButton.classList.remove("opacity-100", "visible");
                backToTopButton.classList.add("opacity-0", "invisible");
            }
        });

        backToTopButton.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
