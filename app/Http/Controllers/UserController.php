<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('activeuser');
    }

    // ModuleProgress

    // Modules (view 1 module)

    // Quizzes

    // Quizzes (POST)

    // QuizResults
}
