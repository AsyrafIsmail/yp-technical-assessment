<x-app-layout>
    <div class="max-w-5xl mx-auto py-6">

        <h1 class="text-2xl font-bold mb-4">Students</h1>
        @if(session('success'))
            <div class="mt-4 p-3 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif
        @foreach($students as $student)
            <div class="p-4 border mb-2 rounded flex justify-between">

                <div>
                    <p class="font-bold">{{ $student->name }}</p>
                    <p class="text-sm text-gray-600">{{ $student->email }}</p>
                </div>

                <a href="{{ route('students.show', $student->id) }}"
                   class="text-blue-500">
                    Manage
                </a>

            </div>
        @endforeach

    </div>
</x-app-layout>
