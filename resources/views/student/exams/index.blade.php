<x-app-layout>
    <div class="max-w-5xl mx-auto py-6">

        <h1 class="text-2xl font-bold mb-4">Available Exams</h1>

        @foreach($exams as $exam)
            <div class="p-4 border mb-3 rounded">

                <h2 class="font-bold">{{ $exam->title }}</h2>
                <p>{{ $exam->duration }} minutes</p>

                <a href="{{ route('student.exam.start', $exam->id) }}"
                   class="text-blue-500">
                    Start Exam
                </a>

            </div>
        @endforeach

    </div>
</x-app-layout>
