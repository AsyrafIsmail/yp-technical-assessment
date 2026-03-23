<x-app-layout>
    <div class="max-w-xl mx-auto py-8 px-4">

        <h1 class="text-2xl font-bold mb-6">Create Class</h1>

        <div class="bg-white p-6 rounded-xl shadow">

            <form action="{{ route('classes.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">Class Name</label>
                    <input type="text" name="name"
                           class="w-full border p-2 rounded focus:ring focus:ring-blue-200"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-2">Assign Subjects</label>

                    <div class="grid grid-cols-2 gap-2">
                        @foreach($subjects as $subject)
                            <label class="flex items-center gap-2 border p-2 rounded hover:bg-gray-50">
                                <input type="checkbox"
                                       name="subjects[]"
                                       value="{{ $subject->id }}">
                                {{ $subject->name }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-end gap-2">

                    <a href="{{ route('classes.index') }}"
                       class="px-4 py-2 border rounded">
                        Cancel
                    </a>

                    <button type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Save
                    </button>

                </div>

            </form>

        </div>

    </div>
</x-app-layout>
