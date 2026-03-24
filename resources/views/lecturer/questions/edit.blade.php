<x-app-layout>
    <div class="max-w-xl mx-auto py-6">

        <h1 class="text-xl font-bold mb-4">Edit Question</h1>

        <form method="POST" action="{{ route('questions.update', $question->id) }}">
            @csrf
            @method('PUT')

            <textarea name="question_text"
                      class="w-full border p-2 mb-3"
                      required>{{ $question->question_text }}</textarea>

            <select name="type" id="question-type" class="w-full border p-2 mb-3">
                <option value="text" {{ $question->type == 'text' ? 'selected' : '' }}>
                    Open-text
                </option>
                <option value="mcq" {{ $question->type == 'mcq' ? 'selected' : '' }}>
                    MCQ
                </option>
            </select>

            <div id="mcq-options" class="{{ $question->type === 'mcq' ? '' : 'hidden' }}">

    <div class="space-y-2">

        @if($question->options->count())
            @foreach($question->options as $index => $option)
                <div class="flex items-center">
                    <span class="mr-2 font-bold">
                        {{ chr(65 + $index) }})
                    </span>

                    <input type="text"
                           name="options[]"
                           value="{{ $option->option_text }}"
                           class="flex-1 border p-2">
                </div>
            @endforeach
        @else
            @for($i = 0; $i < 4; $i++)
                <div class="flex items-center">
                    <span class="mr-2 font-bold">
                        {{ chr(65 + $i) }})
                    </span>

                    <input type="text"
                           name="options[]"
                           class="flex-1 border p-2"
                           placeholder="Option {{ chr(65 + $i) }}">
                </div>
            @endfor
        @endif

    </div>

    <label class="block mt-2">Correct Answer (A–D)</label>
    <input type="text"
           name="correct_index"
           maxlength="1"
           class="border p-2 w-20 uppercase"
           placeholder="A-D">

</div>



            <button class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">
                Update
            </button>

        </form>

    </div>
    <script>
    const typeSelect = document.getElementById('question-type');
    const mcqBlock = document.getElementById('mcq-options');

    function toggleMCQ() {
        if (typeSelect.value === 'mcq') {
            mcqBlock.classList.remove('hidden');
        } else {
            mcqBlock.classList.add('hidden');
        }
    }

    toggleMCQ();

    typeSelect.addEventListener('change', toggleMCQ);
</script>

</x-app-layout>
