<x-app-layout>
    <div class="max-w-3xl mx-auto py-6">

        <h1 class="text-xl font-bold mb-4">Add Questions</h1>

        <form action="{{ route('questions.store', $examId) }}" method="POST">
            @csrf

            <div id="questions-container">

                <!-- Question Template -->
                <div class="question-block border p-4 mb-4 rounded">

                    <h2 class="font-bold mb-2">Question 1</h2>

                    <textarea name="questions[0][question_text]"
                              class="w-full border p-2 mb-2"></textarea>

                    <select name="questions[0][type]"
                            class="w-full border p-2 mb-2 question-type">
                        <option value="text">Open-text</option>
                        <option value="mcq">MCQ</option>
                    </select>

                    <div class="mcq-options hidden">
                        <div class="flex items-center mb-1">
                        <span class="mr-2 font-bold">A)</span>
                        <input type="text" name="questions[0][options][]" class="flex-1 border p-1">
                    </div>

                    <div class="flex items-center mb-1">
                        <span class="mr-2 font-bold">B)</span>
                        <input type="text" name="questions[0][options][]" class="flex-1 border p-1">
                    </div>

                    <div class="flex items-center mb-1">
                        <span class="mr-2 font-bold">C)</span>
                        <input type="text" name="questions[0][options][]" class="flex-1 border p-1">
                    </div>

                    <div class="flex items-center mb-1">
                        <span class="mr-2 font-bold">D)</span>
                        <input type="text" name="questions[0][options][]" class="flex-1 border p-1">
                    </div>


                        <label class="block mt-2">Correct Answer (A–D)</label>
                        <input type="text"
                            name="questions[0][correct_index]"
                            maxlength="1"
                            class="border p-2 w-20 uppercase"
                            required>

                    </div>

                </div>

            </div>

            <button type="button" id="add-question"
                class="bg-blue-500 text-white px-4 py-2 rounded mb-4">
                + Add Question
            </button>

            <br>

            <button type="submit"
                class="bg-green-500 text-white px-4 py-2 rounded">
                Save All Questions
            </button>

        </form>

    </div>
</x-app-layout>
<script>
let questionIndex = 1;

document.getElementById('add-question').addEventListener('click', function () {

    let container = document.getElementById('questions-container');

    let block = document.createElement('div');
    block.classList.add('question-block', 'border', 'p-4', 'mb-4', 'rounded');

    block.innerHTML = `
        <h2 class="font-bold mb-2">Question ${questionIndex + 1}</h2>

        <textarea name="questions[${questionIndex}][question_text]"
                  class="w-full border p-2 mb-2"></textarea>

        <select name="questions[${questionIndex}][type]"
                class="w-full border p-2 mb-2 question-type">
            <option value="text">Text</option>
            <option value="mcq">MCQ</option>
        </select>

        <div class="mcq-options hidden">
            <input type="text" name="questions[${questionIndex}][options][]" placeholder="Option 1" class="block mb-1">
            <input type="text" name="questions[${questionIndex}][options][]" placeholder="Option 2" class="block mb-1">
            <input type="text" name="questions[${questionIndex}][options][]" placeholder="Option 3" class="block mb-1">
            <input type="text" name="questions[${questionIndex}][options][]" placeholder="Option 4" class="block mb-1">

            <label>Correct Index</label>
            <input type="number" name="questions[${questionIndex}][correct_index]" min="0">
        </div>
    `;

    container.appendChild(block);
    questionIndex++;
});

document.addEventListener('change', function(e) {
    if (e.target.classList.contains('question-type')) {
        let parent = e.target.closest('.question-block');
        let mcq = parent.querySelector('.mcq-options');

        if (e.target.value === 'mcq') {
            mcq.classList.remove('hidden');
        } else {
            mcq.classList.add('hidden');
        }
    }
});

document.addEventListener('input', function(e) {
    if (e.target.name.includes('correct_index')) {
        e.target.value = e.target.value.toUpperCase().replace(/[^A-D]/g, '');
    }
});
</script>
