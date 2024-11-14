<!-- resources/views/quiz/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Welcome, {{ Auth::user()->name }}!</h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <a href="{{ route('quiz.start') }}" class="btn btn-primary btn-lg">Start New Quiz</a>
                    </div>

                    @if($quizHistory->count() > 0)
                        <h4>Your Recent Quiz Attempts</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Score</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quizHistory as $attempt)
                                        <tr>
                                            <td>{{ $attempt->created_at->format('M d, Y H:i') }}</td>
                                            <td>{{ $attempt->score }}/{{ $attempt->total_questions }}</td>
                                            <td>{{ ($attempt->score / $attempt->total_questions) * 100 }}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection