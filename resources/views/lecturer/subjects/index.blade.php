<x-app-layout>
    <div class="max-w-5xl mx-auto py-6">

        <h1 class="text-2xl font-bold mb-4">Subjects</h1>

        <a href="{{ route('subjects.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + Add Subject
        </a>

        <table class="w-full mt-4 border">
            <tr>
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Actions</th>
            </tr>

            @foreach($subjects as $subject)
                <tr>
                    <td class="p-2 border">{{ $subject->id }}</td>
                    <td class="p-2 border">{{ $subject->name }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('subjects.edit', $subject->id) }}" class="text-blue-500">Edit</a>

                        <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>

    </div>
</x-app-layout>
