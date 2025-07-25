<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\QuizCategory;
use Illuminate\View\View;

class QuizIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(QuizCategory $category): View
    {
        return view('pages.quiz.index', [
            'category' => $category->load(['quizzes']),
        ]);
    }
}
