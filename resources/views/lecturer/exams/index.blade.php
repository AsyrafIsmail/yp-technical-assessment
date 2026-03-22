<x-app-layout>
    <div class="max-w-5xl mx-auto py-6">

        <h1 class="text-2xl font-bold mb-4">Exams</h1>

        <a href="{{ route('exams.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + Create Exam
        </a>

        <table class="w-full mt-4 border">
            <tr>
                <th class="p-2 border">Title</th>
                <th class="p-2 border">Class</th>
                <th class="p-2 border">Subject</th>
                <th class="p-2 border">Duration</th>
            </tr>

            @foreach($exams as $exam)
                <tr>
                    <td class="p-2 border">{{ $exam->title }}</td>
                    <td class="p-2 border">{{ $exam->classroom->name }}</td>
                    <td class="p-2 border">{{ $exam->subject->name }}</td>
                    <td class="p-2 border">{{ $exam->duration }} mins</td>
                </tr>
            @endforeach

        </table>

    </div>
</x-app-layout>
