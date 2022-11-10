<?php
//testing kranna hadapu file eka postman
namespace App\Http\Controllers;
use App\Models\c_courses;
use App\Models\l_lessons_attachments;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function course(){
        $result= c_courses::all();

        return response()->json($result);
    }     
    
    public function l_lessons_attachments(){
        $result= l_lessons_attachments::all();

        return response()->json($result);
    } 

}
