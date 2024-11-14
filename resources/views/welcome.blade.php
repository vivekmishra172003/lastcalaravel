<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Welcome to Quiz App</h2>
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title mb-4">Test Your Knowledge!</h4>
                    <p class="card-text">
                        Join our quiz platform to challenge yourself with interesting questions.
                    </p>
                    @guest
                        <div class="mt-4">
                            <p class="mb-3">Please login or register to start taking quizzes</p>
                            <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                        </div>
                    @else
                        <div class="mt-4">
                            <a href="{{ route('quiz.start') }}" class="btn btn-primary">Start Quiz</a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection