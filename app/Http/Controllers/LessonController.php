<?php

namespace App\Http\Controllers;

use App\Models\c_courses;
use App\Models\l_lessons;
use App\Models\l_lessons_attachments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LessonController extends Controller
{

    public function index()
    {
        $courses=c_courses::all();
        return view('lesson_with_id')->with(['courses'=>$courses]);
    }

    public function create(){

        $sub=  l_lessons_attachments::where('lesson_id')->count();
        $lessons=DB::table('l_lessons')
                    ->join('c_courses', 'l_lessons.course' ,'=','c_courses.id')
                    ->select('l_lessons.*','c_courses.name as course_name',
                    DB::raw('(select count(*) from l_lessons_attachments where l_lessons_attachments.lesson_id =l_lessons.id) as uploads'))->get();

        return response()->json($lessons);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course' => 'required',
            'lesson_no' => 'required',
            'title' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['validation_error' => $validator->errors()->all()]);
        }else{
            try{
                DB::beginTransaction();

                $type = new l_lessons;
                $type->course = $request->course;
                $type->lesson_no = $request->lesson_no;
                $type->title = $request->title;


                $type->save();

                DB::commit();
                return redirect('/lessons');



            }catch(\Throwable $th){
                // save une nathnm only shows a databse error toaster message
                DB::rollback();
                throw $th;
                return response()->json(['db_error' =>'Database Error'.$th]);
            }

        }
    }
}
