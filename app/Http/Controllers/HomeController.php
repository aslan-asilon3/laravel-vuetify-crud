<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = Students::paginate(10);
        return view('home', compact('students'));
    }

    public function welcome(){
        return view('welcome');
    }
}
