<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuizResult;

class AdminController extends Controller
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

    public function index()
    {
        return view('pages.admin.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function results()
    {
        $results = QuizResult::paginate(20); // TODO
        return view('pages.admin.result.list', ['results' => $results]);
    }
}
