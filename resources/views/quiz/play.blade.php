@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title mb-4">Quiz Time!</h2>
        <form action="{{ route('quiz.submit') }}" method="POST">
            @csrf
            @foreach($questions as $key => $question)
            <div class="mb-4">
                <h5>{{ $key + 1 }}. {{ $question->question }}</h5>
                <div class="form-check">
                    <input type="radio" name="answer_{{ $question->id }}" value="option_a" class="form-check-input" required>
                    <label class="form-check-label">{{ $question->option_a }}</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="answer_{{ $question->id }}" value="option_b" class="form-check-input">
                    <label class="form-check-label">{{ $question->option_b }}</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="answer_{{ $question->id }}" value="option_c" class="form-check-input">
                    <label class="form-check-label">{{ $question->option_c }}</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="answer_{{ $question->id }}" value="option_d" class="form-check-input">
                    <label class="form-check-label">{{ $question->option_d }}</label>
                </div>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit Quiz</button>
        </form>
    </div>
</div>
@endsection