<x-app-layout>
    <div class="max-w-xl mx-auto py-6">

        <h1 class="text-xl font-bold mb-4">Manage Student</h1>

        <p class="mb-2"><strong>Name:</strong> {{ $student->name }}</p>
        <p class="mb-4"><strong>Email:</strong> {{ $student->email }}</p>

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf

            <label class="block mb-2">Assign Class</label>

            <select name="classroom_id" class="w-full border p-2 rounded">
                @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}"
                        {{ $student->classroom_id == $classroom->id ? 'selected' : '' }}>
                        {{ $classroom->name }}
                    </option>
                @endforeach
            </select>

            <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded">
                Save
            </button>
        </form>

    </div>
</x-app-layout>
