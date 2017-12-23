<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Module;
use App\QuizResult;

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
    public function moduleprogress()
    {
        $modules = Module::paginate(20); // TODO
        return view('pages.module.list', ['modules' => $modules]);
    }

    // Modules (view 1 module)
    public function module($id)
    {
        $module = Module::find($id);
        if(!$module) {
            App:abort(404);
        }
        return view('pages.module.view', ['module' => $module, 'title' => "View Module", 'action' => 'show', 'disabled' => true]);
    }

    // Quizzes

    // Quizzes (POST)

    // QuizResults
}
