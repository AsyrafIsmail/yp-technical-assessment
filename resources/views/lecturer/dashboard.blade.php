<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold mb-6">Lecturer Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500">Total Classes</p>
                <h2 class="text-2xl font-bold">{{ $classesCount ?? 0 }}</h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500">Total Subjects</p>
                <h2 class="text-2xl font-bold">{{ $subjectsCount ?? 0 }}</h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500">Total Exams</p>
                <h2 class="text-2xl font-bold">{{ $examsCount ?? 0 }}</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <a href="{{ route('classes.index') }}"
               class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">

                <h2 class="text-xl font-semibold mb-2">Classes</h2>
                <p class="text-gray-500">Manage classrooms</p>
            </a>

            <a href="{{ route('subjects.index') }}"
               class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">

                <h2 class="text-xl font-semibold mb-2">Subjects</h2>
                <p class="text-gray-500">Manage subjects</p>
            </a>

            <a href="{{ route('exams.index') }}"
               class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">

                <h2 class="text-xl font-semibold mb-2">Exams</h2>
                <p class="text-gray-500">Create and manage exams</p>
            </a>

            <a href="{{ route('students.index') }}"
               class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">

                <h2 class="text-xl font-semibold mb-2">Students</h2>
                <p class="text-gray-500">Assign students to classes</p>
            </a>

        </div>

    </div>
</x-app-layout>
