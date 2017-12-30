<?php

namespace ModuleBasedTraining\Http\Controllers;

use Illuminate\Http\Request;
use ModuleBasedTraining\Module;
use ModuleBasedTraining\Question;

class AdminQuizzesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('admin'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $module_id
     * @return \Illuminate\Http\Response
     */
    public function index($module_id)
    {
        $module = Module::find($module_id);
        if(!$module) {
            App:abort(404);
        }
        $questions = $module->questions;
        return view('pages.admin.module.quiz.list', ['module' => $module, 'questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $module_id
     * @return \Illuminate\Http\Response
     */
    public function create($module_id)
    {
        $module = Module::find($module_id);
        if(!$module) {
            App:abort(404);
        }
        return view('pages.admin.module.quiz.edit', ['module' => $module, 'question' => null, 'title' => "Add Question", 'action' => 'create', 'disabled' => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $module_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $module_id)
    {
        $module = Module::find($module_id);
        if(!$module) {
            App:abort(404);
        }

        $this->validate($request, [
            'text' => 'required|string|max:255',
            'a1text' => 'required|string|max:255',
            'a2text' => 'required|string|max:255',
            'a3text' => 'required|string|max:255',
            'a4text' => 'required|string|max:255',
            'correct' => 'required|integer'
        ]);

        $question = new Question;
        $question->module_id = $module_id;
        $question->text = $request->input('text');
        $question->a1text = $request->input('a1text');
        $question->a2text = $request->input('a2text');
        $question->a3text = $request->input('a3text');
        $question->a4text = $request->input('a4text');
        $question->correct = $request->input('correct');
        $question->save();
        return redirect('/admin/modules/'.$module->id.'/quiz')->with('success', 'Question added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $module_id
     * @param  int  $question_id
     * @return \Illuminate\Http\Response
     */
    public function show($module_id, $question_id)
    {
        $module = Module::find($module_id);
        $question = Question::find($question_id);
        if(!$module || !$question || $question->module_id != $module_id) {
            App:abort(404);
        }
        return view('pages.admin.module.quiz.edit', ['module' => $module, 'question' => $question, 'title' => "View Question", 'action' => 'show', 'disabled' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $module_id
     * @param  int  $question_id
     * @return \Illuminate\Http\Response
     */
    public function edit($module_id, $question_id)
    {
        $module = Module::find($module_id);
        $question = Question::find($question_id);
        if(!$module || !$question || $question->module_id != $module_id) {
            App:abort(404);
        }
        return view('pages.admin.module.quiz.edit', ['module' => $module, 'question' => $question, 'title' => "Edit Question", 'action' => 'edit', 'disabled' => false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $module_id
     * @param  int  $question_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $module_id, $question_id)
    {
        $module = Module::find($module_id);
        $question = Question::find($question_id);
        if(!$module || !$question || $question->module_id != $module_id) {
            App:abort(404);
        }

        $this->validate($request, [
            'text' => 'required|string|max:255',
            'a1text' => 'required|string|max:255',
            'a2text' => 'required|string|max:255',
            'a3text' => 'required|string|max:255',
            'a4text' => 'required|string|max:255',
            'correct' => 'required|integer'
        ]);

        $question->module_id = $module_id;
        $question->text = $request->input('text');
        $question->a1text = $request->input('a1text');
        $question->a2text = $request->input('a2text');
        $question->a3text = $request->input('a3text');
        $question->a4text = $request->input('a4text');
        $question->correct = $request->input('correct');
        $question->save();
        return redirect('/admin/modules/'.$module->id.'/quiz')->with('success', 'Question updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $module_id
     * @param  int  $question_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($module_id, $question_id)
    {
        $module = Module::find($module_id);
        $question = Question::find($question_id);
        if(!$module || !$question || $question->module_id != $module_id) {
            App:abort(404);
        }
        $question->delete();
        return redirect('/admin/modules/'.$module->id.'/quiz')->with('success', 'Question deleted.');
    }
}
