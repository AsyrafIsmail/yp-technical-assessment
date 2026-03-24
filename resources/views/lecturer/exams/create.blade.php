<x-app-layout>
    <div class="max-w-xl mx-auto py-8 px-4">

        <h1 class="text-2xl font-bold mb-6">Create Exam</h1>

        <div class="bg-white p-6 rounded-xl shadow">

            <form action="{{ route('exams.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">Exam Title</label>
                    <input type="text" name="title"
                           class="w-full border p-2 rounded focus:ring focus:ring-blue-200"
                           placeholder="e.g. Midterm Test"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">Class</label>
                    <select name="classroom_id"
                            id="classroom"
                            class="w-full border p-2 rounded focus:ring focus:ring-blue-200"
                            required>
                        <option value="">Select Class</option>

                        @foreach($classrooms as $class)
                            <option value="{{ $class->id }}">
                                {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">Subject</label>
                    <select name="subject_id"
                            id="subject"
                            class="w-full border p-2 rounded focus:ring focus:ring-blue-200"
                            required>
                        <option value="">Select Subject</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">Duration (minutes)</label>
                    <input type="number" name="duration"
                           class="w-full border p-2 rounded focus:ring focus:ring-blue-200"
                           min="1"
                           placeholder="e.g. 15"
                           required>
                </div>

                <div class="flex justify-end gap-2">

                    <a href="{{ route('exams.index') }}"
                       class="px-4 py-2 border rounded">
                        Cancel
                    </a>

                    <button type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Save Exam
                    </button>

                </div>

            </form>

        </div>

    </div>

    <script>
        const classrooms = @json($classrooms);
        const classSelect = document.getElementById('classroom');
        const subjectSelect = document.getElementById('subject');

        classSelect.addEventListener('change', function () {
            const selectedId = this.value;

            subjectSelect.innerHTML = '<option value="">Select Subject</option>';

            const selectedClass = classrooms.find(c => c.id == selectedId);

            if (selectedClass) {
                selectedClass.subjects.forEach(subject => {
                    subjectSelect.innerHTML += `
                        <option value="${subject.id}">
                            ${subject.name}
                        </option>
                    `;
                });
            }
        });
    </script>

</x-app-layout>
