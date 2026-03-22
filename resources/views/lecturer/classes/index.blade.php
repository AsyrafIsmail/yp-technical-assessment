<x-app-layout>
    <div class="max-w-5xl mx-auto py-6">

        <h1 class="text-2xl font-bold mb-4">Classes</h1>

        <a href="{{ route('classes.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + Add Class
        </a>

        @if(session('success'))
            <div class="mt-4 p-3 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-6">
            <table class="w-full border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">ID</th>
                        <th class="p-2 border">Name</th>
                        <th class="p-2 border">Subjects</th>
                        <th class="p-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classrooms as $classroom)
                        <tr>
                            <td class="p-2 border">{{ $classroom->id }}</td>
                            <td class="p-2 border">{{ $classroom->name }}</td>
                            <td class="p-2 border">
                                @foreach($classroom->subjects as $subject)
                                    <span class="bg-gray-200 px-2 py-1 rounded text-sm">
                                        {{ $subject->name }}
                                    </span>
                                @endforeach
                            </td>

                            <td class="p-2 border space-x-2">

                                <a href="{{ route('classes.edit', $classroom->id) }}"
                                   class="text-blue-500">
                                    Edit
                                </a>

                                <form action="{{ route('classes.destroy', $classroom->id) }}"
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="text-red-500">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
