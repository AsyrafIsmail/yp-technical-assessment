<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4">

    <div class="flex justify-between items-center bg-white p-4 rounded-xl shadow mb-4">
        <div>
            <p class="text-gray-500 text-sm">Time Remaining</p>
            <p id="timer" class="text-2xl font-bold text-blue-600"></p>
        </div>
        <div id="timer-status" class="text-sm font-semibold text-green-600">
            On Track
        </div>
    </div>

        <div class="bg-white p-6 rounded-xl shadow mb-6">
            <h1 class="text-2xl font-bold mb-2">{{ $exam->title }}</h1>

            <p class="text-gray-500">
                📘 {{ $exam->subject->name ?? '' }}
            </p>

            <p class="text-gray-500">
                ⏱ Duration: {{ $exam->duration }} minutes
            </p>
        </div>

        <form action="{{ route('student.exam.submit', $exam->id) }}" method="POST">
            @csrf

            <div class="space-y-6">

                @foreach($exam->questions as $index => $question)

                    <div class="bg-white p-6 rounded-xl shadow">

                        <!-- Question -->
                        <h2 class="font-semibold mb-4">
                            Q{{ $index + 1 }}. {{ $question->question_text }}
                        </h2>

                        @if($question->type === 'mcq')
                            <div class="space-y-2">

                                @foreach($question->options as $optIndex => $option)
                                    <label class="flex items-center gap-2 p-2 border rounded hover:bg-gray-50 cursor-pointer">

                                        <input type="radio"
                                               name="answers[{{ $question->id }}]"
                                               value="{{ $option->id }}"
                                               class="text-blue-500">

                                        <span>
                                            {{ chr(65 + $optIndex) }}) {{ $option->option_text }}
                                        </span>

                                    </label>
                                @endforeach

                            </div>
                        @endif

                        @if($question->type === 'text')
                            <textarea
                                name="answers[{{ $question->id }}]"
                                class="w-full border p-3 rounded"
                                rows="3"
                                placeholder="Write your answer here..."></textarea>
                        @endif

                    </div>

                @endforeach

            </div>

            <div class="mt-6 text-right">
                <button type="submit"
                        class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">
                    Submit Exam
                </button>
            </div>

        </form>

    </div>
</x-app-layout>

<script>
    let time = {{ $exam->duration * 60 }};
    let timerElement = document.getElementById('timer');
    let statusElement = document.getElementById('timer-status');

    let timer = setInterval(() => {
        let minutes = Math.floor(time / 60);
        let seconds = time % 60;

        timerElement.innerText =
            `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

        // 🔥 Color changes
        if (time <= 60) {
            timerElement.classList.remove('text-blue-600');
            timerElement.classList.add('text-red-600');
            statusElement.innerText = "Hurry Up!";
            statusElement.classList.add('text-red-600');
        } else if (time <= 180) {
            timerElement.classList.remove('text-blue-600');
            timerElement.classList.add('text-yellow-500');
            statusElement.innerText = "Almost There";
        }

        time--;

        if (time < 0) {
            clearInterval(timer);
            alert("Time is up! Submitting...");
            document.querySelector('form').submit();
        }

    }, 1000);
</script>
