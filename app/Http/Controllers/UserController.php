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

    // Quizzes (view quiz)
    public function quiz($id)
    {
        $module = Module::find($id);
        if(!$module) {
            App:abort(404);
        }
        $questions = $module->questions;
        return view('pages.module.quiz', ['module' => $module, 'questions' => $questions, 'title' => "Submit Quiz", 'action' => 'show', 'disabled' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $module_id
     * @return \Illuminate\Http\Response
     */
    public function quizpost(Request $request, $module_id)
    {
        $module = Module::find($module_id);
        if(!$module) {
            App:abort(404);
        }
        $questions = $module->questions;
        $correctquestions = 0;
        $totalquestions = count($module->questions);

        foreach ($questions as $question) {
            $var = 'q'.$question->id;
            if (isset($request->$var) && ($request->$var == $question->correct)) {
                $correctquestions++;
            }
        }

        if($totalquestions > 0) {
            $percent = (round($correctquestions / $totalquestions * 100));
            $pass = $percent >= 66 ? true : false;
        } else {
            $pass = true;
        }

        $result = new QuizResult;
        $result->user_id = auth()->user()->id;
        $result->module_id = $module_id;
        $result->correctquestions = $correctquestions;
        $result->pass = $pass;

        $result->save();
        return redirect('/results')->with('success', 'Quiz Graded.');
    }

    // QuizResults
    public function quizresults()
    {
        $user = auth()->user();
        $results = $user->results;
        return view('pages.results.list', ['results' => $results]);
    }
}
