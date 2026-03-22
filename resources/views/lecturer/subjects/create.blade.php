<x-app-layout>
    <div class="max-w-xl mx-auto py-6">

        <h1 class="text-2xl font-bold mb-4">Create Subject</h1>

        <form action="{{ route('subjects.store') }}" method="POST">
            @csrf

            <input type="text" name="name" class="w-full border p-2 rounded">

            <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded">
                Save
            </button>
        </form>

    </div>
</x-app-layout>
