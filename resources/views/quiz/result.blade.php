<!-- resources/views/quiz/result.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Quiz Results</h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h4>Your Score: {{ $score }}/10</h4>
                        <div class="progress mt-3" style="height: 25px;">
                            <div class="progress-bar {{ $score >= 7 ? 'bg-success' : ($score >= 5 ? 'bg-warning' : 'bg-danger') }}" 
                                 role="progressbar" 
                                 style="width: {{ ($score/10)*100 }}%">
                                {{ ($score/10)*100 }}%
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5>Detailed Results:</h5>
                        @foreach($results as $index => $result)
                            <div class="card mb-3 {{ $result['is_correct'] ? 'border-success' : 'border-danger' }}">
                                <div class="card-body">
                                    <p class="mb-2"><strong>Question {{ $index + 1 }}:</strong> {{ $result['question'] }}</p>
                                    <p class="mb-1">Your Answer: {{ $result['user_answer'] }}</p>
                                    <p class="mb-0 {{ $result['is_correct'] ? 'text-success' : 'text-danger' }}">
                                        Correct Answer: {{ $result['correct_answer'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('quiz.start') }}" class="btn btn-primary me-2">Take Another Quiz</a>
                        <a href="{{ route('quiz.index') }}" class="btn btn-secondary">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection