<?php

namespace App\Http\Controllers;

use App\Models\c_courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;

class C_CourseController extends Controller
{
    public function index()
    {
        return view('c_cource');
    }

    public function create(){

        $result = c_courses::all();

        return $result;

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['validation_error' => $validator->errors()->all()]);
        }else{
            try{
                DB::beginTransaction();

                $type = new c_courses;
                //database name        Frontend into backend name
                $type->name = $request->name;


                $type->save();

                DB::commit();
                return redirect('/course');

            }catch(\Throwable $th){
                DB::rollback();
                throw $th;
                return response()->json(['db_error' =>'Database Error'.$th]);
            }

        }
    }

    public function show($id){
        $result = c_courses::find($id);

        return response()->json($result);

    }


    public function update(Request $request,$id){
        $capcity=c_courses::find($id);
        $capcity->update($request->all());
        return response(true);

    }

    public function destroy($id){
        $result = c_courses::destroy($id);

        // send output to the frontend using json{id:1}

        return response()->json($result);

    }
}
