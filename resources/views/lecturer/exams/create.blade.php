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
                <select id="classroom" name="classroom_id" class="w-full border p-2 rounded">
                    <option value="">Select Class</option>

                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->id }}"
                            data-subjects='@json($classroom->subjects)'>
                            {{ $classroom->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Subject</label>
                <select id="subject" name="subject_id" class="w-full border p-2 rounded">
                    <option value="">Select Subject</option>
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

<script>
    document.getElementById('classroom').addEventListener('change', function () {

        let selected = this.options[this.selectedIndex];
        let subjects = JSON.parse(selected.getAttribute('data-subjects') || '[]');

        let subjectDropdown = document.getElementById('subject');

        subjectDropdown.innerHTML = '<option value="">Select Subject</option>';

        subjects.forEach(function(subject) {
            let option = document.createElement('option');
            option.value = subject.id;
            option.text = subject.name;
            subjectDropdown.appendChild(option);
        });

    });
</script>
