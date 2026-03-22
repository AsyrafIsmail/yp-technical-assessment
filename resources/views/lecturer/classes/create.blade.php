<x-app-layout>
    <div class="max-w-xl mx-auto py-6">

        <h1 class="text-2xl font-bold mb-4">Create Class</h1>

        <form action="{{ route('classes.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1">Class Name</label>
                <input type="text" name="name"
                       class="w-full border p-2 rounded">
            </div>

            <button type="submit"
                    class="bg-green-500 text-white px-4 py-2 rounded">
                Save
            </button>

        </form>

    </div>
</x-app-layout>
