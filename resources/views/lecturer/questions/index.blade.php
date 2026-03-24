<x-app-layout>
    @if(session('success'))
        <div class="mt-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif
    <div class="max-w-5xl mx-auto py-8 px-4">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">
                Questions - {{ $exam->title }}
            </h1>

            <a href="{{ route('questions.create', $exam->id) }}"
               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                + Add Question
            </a>
        </div>

        <div class="space-y-4">

            @forelse($exam->questions as $index => $question)

                <div class="bg-white p-5 rounded-xl shadow">

                    <div class="flex justify-between mb-2">
                        <h2 class="font-semibold">
                            Q{{ $index + 1 }}: {{ $question->question_text }}
                        </h2>

                        <span class="text-sm text-gray-500">
                            {{ strtoupper($question->type) }}
                        </span>
                    </div>

                    @if($question->type === 'mcq')
                        <ul class="mt-2 space-y-1">

                            @foreach($question->options as $optIndex => $option)
                                <li class="{{ $option->is_correct ? 'text-green-600 font-semibold' : '' }}">
                                    {{ chr(65 + $optIndex) }}) {{ $option->option_text }}
                                </li>
                            @endforeach

                        </ul>
                    @endif
                    <div class="flex gap-2">

                        <a href="{{ route('questions.edit', $question->id) }}"
                        class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                            Edit
                        </a>

                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST"
                            onsubmit="return confirm('Delete this question?')">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>

                    </div>

                </div>

            @empty
                <div class="text-center text-gray-500">
                    No questions added yet.
                </div>
            @endforelse

        </div>

    </div>
</x-app-layout>
