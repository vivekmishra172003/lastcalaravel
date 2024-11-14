<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\UserQuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Get user's quiz history
        $quizHistory = UserQuizAttempt::where('user_id', Auth::id())
                                    ->orderBy('created_at', 'desc')
                                    ->take(5)
                                    ->get();

        return view('quiz.index', compact('quizHistory'));
    }

    public function start()
    {
        // Check if we have enough questions
        $questionsCount = Question::count();
        if ($questionsCount < 10) {
            return redirect()->route('quiz.index')
                           ->with('error', 'Not enough questions available. Please try again later.');
        }

        $questions = Question::inRandomOrder()->limit(10)->get();
        session(['quiz_questions' => $questions]);
        return view('quiz.play', compact('questions'));
    }

    public function submit(Request $request)
    {
        $questions = session('quiz_questions');
        if (!$questions) {
            return redirect()->route('quiz.index')
                           ->with('error', 'Quiz session expired. Please start a new quiz.');
        }

        $score = 0;
        $results = [];

        foreach ($questions as $question) {
            $userAnswer = $request->input('answer_' . $question->id);
            $isCorrect = $userAnswer === $question->correct_answer;
            if ($isCorrect) {
                $score++;
            }

            // Store results for detailed feedback
            $results[] = [
                'question' => $question->question,
                'user_answer' => $userAnswer ? $question->{$userAnswer} : 'Not answered',
                'correct_answer' => $question->{$question->correct_answer},
                'is_correct' => $isCorrect
            ];
        }

        // Save the attempt
        UserQuizAttempt::create([
            'user_id' => Auth::id(),
            'score' => $score,
            'total_questions' => 10
        ]);

        // Clear the quiz session
        session()->forget('quiz_questions');
        
        return view('quiz.result', compact('score', 'results'));
    }
}