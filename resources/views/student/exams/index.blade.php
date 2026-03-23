<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Available Exams</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($exams as $exam)

                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition flex flex-col justify-between">

                    <div>
                        <h2 class="text-xl font-semibold mb-2">
                            {{ $exam->title }}
                        </h2>

                        <p class="text-gray-500 text-sm mb-1">
                            📘 {{ $exam->subject->name ?? 'No Subject' }}
                        </p>

                        <p class="text-gray-500 text-sm">
                            ⏱ {{ $exam->duration }} minutes
                        </p>
                    </div>

                    <div class="mt-4">

                        @if($exam->answered)
                            <span class="block text-center bg-green-100 text-green-700 py-2 rounded font-semibold">
                                ✅ Answered
                            </span>
                        @else
                            <a href="{{ route('student.exam.start', $exam->id) }}"
                               class="block text-center bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
                                Start Exam
                            </a>
                        @endif

                    </div>

                </div>

            @empty

                <div class="col-span-3 text-center text-gray-500">
                    No exams available for your class.
                </div>

            @endforelse

            <a href="{{ route('student.dashboard') }}"class="text-blue-500 hover:underline mb-4 inline-block">
                ← Back to Dashboard
            </a>

        </div>

    </div>
</x-app-layout>
