<x-app-layout>
    <div class="max-w-xl mx-auto py-8 px-4">

        <h1 class="text-2xl font-bold mb-6">Edit Subject</h1>

        <div class="bg-white p-6 rounded-xl shadow">

            <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">Subject Name</label>
                    <input type="text" name="name"
                           value="{{ $subject->name }}"
                           class="w-full border p-2 rounded focus:ring focus:ring-blue-200"
                           required>
                </div>

                <div class="flex justify-end gap-2">

                    <a href="{{ route('subjects.index') }}"
                       class="px-4 py-2 border rounded">
                        Cancel
                    </a>

                    <button type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Update
                    </button>

                </div>

            </form>

        </div>

    </div>
</x-app-layout>
