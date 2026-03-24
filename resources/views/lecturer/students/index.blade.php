<x-app-layout>
    <div class="max-w-6xl mx-auto py-8 px-4">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                Students Management
            </h1>
        </div>

        <form method="GET" class="mb-4">
            <input type="text" name="search"
                placeholder="Search student..."
                class="w-full border p-2 rounded">
        </form>
        <p class="text-sm text-gray-500">
            Total Students: {{ $students->count() }}
        </p>

        <div class="bg-white shadow rounded-xl overflow-hidden">

            <table class="w-full text-left border-collapse">


                <thead class="bg-gray-100 text-gray-600 text-sm uppercase">
                    <tr>
                        <th class="p-4">Name</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Class</th>
                        <th class="p-4 text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse($students as $student)
                        <tr class="hover:bg-gray-50 transition">

                            <td class="p-4 font-medium text-gray-800">
                                {{ $student->name }}
                            </td>

                            <td class="p-4 text-gray-600">
                                {{ $student->email }}
                            </td>

                            <td class="p-4">
                                @if($student->classroom)
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                                        {{ $student->classroom->name }}
                                    </span>
                                @else
                                    <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-sm">
                                        Not Assigned
                                    </span>
                                @endif
                            </td>

                            <td class="p-4 text-center">

                                <a href="{{ route('students.show', $student->id) }}"
                                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                                    Manage
                                </a>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-6 text-center text-gray-500">
                                No students found.
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>
        {{ $students->links() }}
    </div>
</x-app-layout>
