<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;

class AdminModulesController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::paginate(20);
        return view('pages.admin.module.list', ['modules' => $modules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.module.edit', ['module' => null, 'title' => "Create Module", 'action' => 'create', 'disabled' => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:16777215'
        ]);

        $module = new Module;
        $module->title = $request->input('title');
        $module->body = $request->input('body');
        $module->save();
        return redirect('/admin/modules')->with('success', 'Module created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module = Module::find($id);
        if(!$module) {
            App:abort(404);
        }
        return view('pages.admin.module.edit', ['module' => $module, 'title' => "View Module", 'action' => 'show', 'disabled' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Module::find($id);
        if(!$module) {
            App:abort(404);
        }
        return view('pages.admin.module.edit', ['module' => $module, 'title' => "Edit Module", 'action' => 'edit', 'disabled' => false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $module = Module::find($id);
        if(!$module) {
            App:abort(404);
        }
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:16777215'
        ]);

        $module->title = $request->input('title');
        $module->body = $request->input('body');
        $module->save();
        return redirect('/admin/modules')->with('success', 'Module updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);
        if(!$module) {
            App:abort(404);
        }
        $module->delete();
        return redirect('/admin/modules')->with('success', 'Module deleted.');
    }
}
