<x-app-layout>
    @if(session('success'))
        <div class="mt-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif
    <div class="max-w-6xl mx-auto py-8 px-4">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Exams</h1>

            <a href="{{ route('exams.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                + Create Exam
            </a>
        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="w-full text-left">

                <thead class="bg-gray-100 text-gray-600 text-sm">
                    <tr>
                        <th class="p-4">Title</th>
                        <th class="p-4">Class</th>
                        <th class="p-4">Subject</th>
                        <th class="p-4">Duration</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($exams as $exam)
                        <tr class="border-t hover:bg-gray-50">

                            <td class="p-4 font-semibold">
                                {{ $exam->title }}
                            </td>

                            <td class="p-4">
                                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-sm">
                                    {{ $exam->classroom->name ?? '-' }}
                                </span>
                            </td>

                            <td class="p-4">
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">
                                    {{ $exam->subject->name ?? '-' }}
                                </span>
                            </td>

                            <td class="p-4">
                                ⏱ {{ $exam->duration }} min
                            </td>

                            <td class="p-4 text-right space-x-2">

                                <a href="{{ route('questions.index', $exam->id) }}"
                                   class="text-purple-500 hover:underline">
                                    Questions
                                </a>

                                <a href="{{ route('exams.edit', $exam->id) }}"
                                   class="text-blue-500 hover:underline">
                                    Edit
                                </a>

                                <form action="{{ route('exams.destroy', $exam->id) }}"
                                      method="POST"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Delete this exam?')"
                                            class="text-red-500 hover:underline">
                                        Delete
                                    </button>
                                </form>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">
                                No exams created yet.
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
</x-app-layout>
