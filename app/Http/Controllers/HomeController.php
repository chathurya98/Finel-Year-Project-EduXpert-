<?php

namespace App\Http\Controllers;

use App\Models\c_courses;
use App\Models\l_lessons;
use App\Models\l_lessons_attachments;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // check whether the user is logged
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // dashboard data showing
    public function index()
    {
        $User = User::all();
        $l_lessons_attachments = l_lessons_attachments::all();
        $c_courses = c_courses::all();
        $l_lessons = l_lessons::all();
        return view('home')->with([
            'User' => $User->count(),
            'l_lessons_attachments' => $l_lessons_attachments->count(),
            'c_courses' => $c_courses->count(),
            'l_lessons' => $l_lessons->count(),
        ]);
    }


}
