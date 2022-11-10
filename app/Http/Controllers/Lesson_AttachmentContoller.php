<?php

namespace App\Http\Controllers;

use App\Models\l_lessons_attachments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Lesson_AttachmentContoller extends Controller
{
    public function index(){
        //return the data into the frontend
        return response()->json(l_lessons_attachments::all());
    }

    public function store(Request $request){

        return response()->json(l_lessons_attachments::create($request->all()));
    }

    public function show($id){
       $attachments= l_lessons_attachments::where('lesson_id','=',$id)->get();
       return response()->json($attachments);
    }

    public function destroy($id){
       $x= l_lessons_attachments::where('drive_id','=',$id)->delete();
        return response()->json($x);
    }


}
