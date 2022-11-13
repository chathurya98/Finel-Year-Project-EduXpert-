<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VfacerecognitionController extends Controller
{
    public function index(){

        return view('face_recognition');
    }
}
