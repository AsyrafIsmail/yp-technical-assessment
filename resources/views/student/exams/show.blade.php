<p id="timer" class="text-red-500 font-bold"></p>

<script>
    let time = {{ $exam->duration }} * 60;

    let timer = setInterval(function () {
        let minutes = Math.floor(time / 60);
        let seconds = time % 60;

        document.getElementById('timer').innerText =
            minutes + ":" + (seconds < 10 ? '0' : '') + seconds;

        time--;

        if (time < 0) {
            clearInterval(timer);
            document.forms[0].submit();
        }

    }, 1000);
</script>

<x-app-layout>
    <div class="max-w-3xl mx-auto py-6">

        <h1 class="text-xl font-bold mb-4">{{ $exam->title }}</h1>

        <form action="{{ route('student.exam.submit', $exam->id) }}" method="POST">
            @csrf

            @foreach($exam->questions as $question)
                <div class="mb-4">

                    <p>{{ $question->question_text }}</p>

                    @if($question->type === 'mcq')
                        @foreach($question->options as $option)
                            <div>
                                <input type="radio"
                                       name="answers[{{ $question->id }}]"
                                       value="{{ $option->id }}">
                                {{ $option->option_text }}
                            </div>
                        @endforeach
                    @else
                        <textarea name="answers[{{ $question->id }}]"
                                  class="w-full border p-2"></textarea>
                    @endif

                </div>
            @endforeach

            <button class="bg-green-500 text-white px-4 py-2">
                Submit Exam
            </button>

        </form>

    </div>
</x-app-layout>
