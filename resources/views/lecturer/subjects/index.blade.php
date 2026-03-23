<x-app-layout>
    @if(session('success'))
        <div class="mt-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif
    <div class="max-w-6xl mx-auto py-8 px-4">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Subjects</h1>

            <a href="{{ route('subjects.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                + Create Subject
            </a>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="w-full text-left">

                <thead class="bg-gray-100 text-gray-600 text-sm">
                    <tr>
                        <th class="p-4">Subject Name</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($subjects as $subject)
                        <tr class="border-t hover:bg-gray-50">

                            <td class="p-4 font-semibold">
                                {{ $subject->name }}
                            </td>

                            <td class="p-4 text-right space-x-3">

                                <a href="{{ route('subjects.edit', $subject->id) }}"
                                   class="text-blue-500 hover:underline">
                                    Edit
                                </a>

                                <form action="{{ route('subjects.destroy', $subject->id) }}"
                                      method="POST"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Delete this subject?')"
                                            class="text-red-500 hover:underline">
                                        Delete
                                    </button>
                                </form>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="p-6 text-center text-gray-500">
                                No subjects found.
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
</x-app-layout>
