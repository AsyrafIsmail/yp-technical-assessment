<x-app-layout>
    <div class="max-w-xl mx-auto py-6">

        <h1 class="text-2xl font-bold mb-4">Edit Class</h1>

        @if($errors->any())
            <div class="mb-4 p-3 bg-red-200 text-red-800 rounded">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('classes.update', $classroom->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1">Class Name</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $classroom->name) }}"
                    class="w-full border p-2 rounded"
                >
            </div>
            <div>
                <label class="block mb-2">Assign Subjects</label>

                @foreach($subjects as $subject)
                    <div>
                        <input type="checkbox"
                            name="subjects[]"
                            value="{{ $subject->id }}"
                            {{ $classroom->subjects->contains($subject->id) ? 'checked' : '' }}>

                        {{ $subject->name }}
                    </div>
                @endforeach
            </div>

            <div class="flex justify-between items-center">

                <a href="{{ route('classes.index') }}"
                   class="text-gray-600 hover:underline">
                    ← Back
                </a>

                <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded">
                    Update
                </button>

            </div>

        </form>

    </div>
</x-app-layout>
