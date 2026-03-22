<x-app-layout>
    <div class="max-w-xl mx-auto py-6">

        <h1 class="text-2xl font-bold mb-4">Create Exam</h1>

        <form action="{{ route('exams.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label>Exam Title</label>
                <input type="text" name="title" class="w-full border p-2 rounded">
            </div>

            <div>
                <label>Class</label>
                <select name="classroom_id" class="w-full border p-2 rounded">
                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->id }}">
                            {{ $classroom->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Subject</label>
                <select name="subject_id" class="w-full border p-2 rounded">
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">
                            {{ $subject->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Duration (minutes)</label>
                <input type="number" name="duration" class="w-full border p-2 rounded">
            </div>

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Create Exam
            </button>

        </form>

    </div>
</x-app-layout>
