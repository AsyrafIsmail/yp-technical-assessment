<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4">

        <!-- Header -->
        <h1 class="text-3xl font-bold mb-6">Student Dashboard</h1>

        <!-- Student Info -->
        <div class="bg-white p-6 rounded-xl shadow mb-6">
            <p class="text-gray-500">Welcome,</p>
            <h2 class="text-xl font-bold">{{ auth()->user()->name }}</h2>

            <p class="text-gray-500 mt-2">Class:</p>
            <h3 class="font-semibold">
                {{ auth()->user()->classroom->name ?? 'Not Assigned' }}
            </h3>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500">Total Exams</p>
                <h2 class="text-2xl font-bold">{{ $totalExams ?? 0 }}</h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500">Completed</p>
                <h2 class="text-2xl font-bold text-green-600">{{ $completedExams ?? 0 }}</h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500">Pending</p>
                <h2 class="text-2xl font-bold text-red-500">{{ $pendingExams ?? 0 }}</h2>
            </div>

        </div>

        <!-- Exams Section -->
        <div class="bg-white p-6 rounded-xl shadow">

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Your Exams</h2>

                <a href="{{ route('student.exams') }}"
                   class="text-blue-500 hover:underline">
                    View All
                </a>
            </div>

            @forelse($exams as $exam)
                <div class="border-b py-3 flex justify-between items-center">

                    <div>
                        <h3 class="font-semibold">{{ $exam->title }}</h3>
                        <p class="text-sm text-gray-500">
                            {{ $exam->subject->name ?? '' }}
                        </p>
                        <p class="text-sm text-gray-400">
                            Duration: {{ $exam->duration }} minutes
                        </p>
                    </div>

                    <div>
                        @if($exam->answered)
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded">
                                Answered
                            </span>
                        @else
                            <a href="{{ route('student.exam.start', $exam->id) }}"
                               class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Start
                            </a>
                        @endif
                    </div>

                </div>
            @empty
                <p class="text-gray-500">No exams available.</p>
            @endforelse

        </div>

    </div>
</x-app-layout>
