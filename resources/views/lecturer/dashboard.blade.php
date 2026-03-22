<x-app-layout>
    <div class="max-w-5xl mx-auto py-6">

        <h1 class="text-2xl font-bold mb-6">Lecturer Dashboard</h1>

        <div class="grid grid-cols-3 gap-4">

            <a href="{{ route('classes.index') }}"
               class="p-6 bg-white shadow rounded text-center hover:bg-gray-100">
                Classes
            </a>

            <a href="#"
               class="p-6 bg-white shadow rounded text-center hover:bg-gray-100">
                Subjects
            </a>

            <a href="#"
               class="p-6 bg-white shadow rounded text-center hover:bg-gray-100">
                Exams
            </a>

        </div>

    </div>
</x-app-layout>
