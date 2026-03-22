<x-app-layout>
    <div class="max-w-xl mx-auto py-6">

        <h1>Add Question</h1>

        <form action="{{ route('questions.store', $examId) }}" method="POST">
            @csrf

            <textarea name="question_text" class="w-full border p-2"></textarea>

            <select name="type" id="type" class="w-full border p-2 mt-2">
                <option value="text">Text</option>
                <option value="mcq">MCQ</option>
            </select>

            <div id="mcq-options" style="display:none;">
                <input type="text" name="options[]" placeholder="Option 1">
                <input type="text" name="options[]" placeholder="Option 2">
                <input type="text" name="options[]" placeholder="Option 3">
                <input type="text" name="options[]" placeholder="Option 4">

                <label>Correct Answer (index)</label>
                <input type="number" name="correct_index">
            </div>

            <button class="mt-4 bg-green-500 text-white px-4 py-2">
                Save Question
            </button>

        </form>

    </div>
</x-app-layout>

<script>
document.getElementById('type').addEventListener('change', function() {
    let mcq = document.getElementById('mcq-options');

    if (this.value === 'mcq') {
        mcq.style.display = 'block';
    } else {
        mcq.style.display = 'none';
    }
});
</script>
