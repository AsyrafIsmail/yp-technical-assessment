<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YP Exam Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

            <h1 class="text-xl font-bold text-blue-600">
                YP Exam Portal
            </h1>

            <div class="space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="text-gray-700 hover:underline">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="text-gray-700 hover:underline">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Register
                    </a>
                @endauth
            </div>

        </div>
    </nav>

    <section class="max-w-7xl mx-auto px-4 py-20 text-center">

        <h2 class="text-4xl font-bold mb-4">
            Online Examination & Student Management System
        </h2>

        <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
            A simple and efficient platform for lecturers to manage classes,
            create exams, and for students to take exams seamlessly.
        </p>

        <div class="space-x-4">
            @guest
                <a href="{{ route('register') }}"
                   class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">
                    Get Started
                </a>

                <a href="{{ route('login') }}"
                   class="border px-6 py-3 rounded-lg hover:bg-gray-200">
                    Login
                </a>
            @else
                <a href="{{ route('dashboard') }}"
                   class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">
                    Go to Dashboard
                </a>
            @endguest
        </div>

    </section>

    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4">

            <h3 class="text-2xl font-bold text-center mb-10">
                Features
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="p-6 rounded-xl shadow text-center">
                    <h4 class="font-semibold mb-2">Class Management</h4>
                    <p class="text-gray-500 text-sm">
                        Organize students into classes easily.
                    </p>
                </div>

                <div class="p-6 rounded-xl shadow text-center">
                    <h4 class="font-semibold mb-2">Exam Creation</h4>
                    <p class="text-gray-500 text-sm">
                        Create MCQ and text-based exams quickly.
                    </p>
                </div>

                <div class="p-6 rounded-xl shadow text-center">
                    <h4 class="font-semibold mb-2">Timed Exams</h4>
                    <p class="text-gray-500 text-sm">
                        Control exam duration with built-in timer.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <footer class="text-center py-6 text-gray-500 text-sm">
        © {{ date('Y') }} YP Exam Portal. All rights reserved.
    </footer>

</body>
</html>
