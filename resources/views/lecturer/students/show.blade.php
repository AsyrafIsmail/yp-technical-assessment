<x-app-layout>
    <div class="max-w-3xl mx-auto py-8 px-4">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Manage Student
        </h1>

        <div class="bg-white shadow rounded-xl p-6">

            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">
                    Student Information
                </h2>

                <p class="text-gray-800 font-medium">
                    {{ $student->name }}
                </p>

                <p class="text-gray-600 text-sm">
                    {{ $student->email }}
                </p>
            </div>

            <div class="mb-6">
                <h2 class="text-sm text-gray-500 mb-1">Current Class</h2>

                @if($student->classroom)
                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                        {{ $student->classroom->name }}
                    </span>
                @else
                    <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-sm">
                        Not Assigned
                    </span>
                @endif
            </div>

            <form method="POST" action="{{ route('students.update', $student->id) }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">
                        Assign to Class
                    </label>

                    <select name="classroom_id"
                            class="w-full border p-2 rounded focus:ring focus:ring-blue-200"
                            required>

                        <option value="">Select Class</option>

                        @foreach($classrooms as $class)
                            <option value="{{ $class->id }}"
                                {{ $student->classroom_id == $class->id ? 'selected' : '' }}>
                                {{ $class->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="flex justify-between items-center mt-6">

                    <a href="{{ route('students.index') }}"
                       class="text-gray-500 hover:underline">
                        ← Back
                    </a>

                    <button type="submit"
                            class="bg-green-500 text-white px-5 py-2 rounded hover:bg-green-600 transition">
                        Save
                    </button>

                </div>

            </form>

        </div>

    </div>
</x-app-layout>
