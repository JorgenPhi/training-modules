<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizResultsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
