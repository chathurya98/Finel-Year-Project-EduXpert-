<?php

namespace App\Http\Controllers;

use App\Models\caption_add;
use Illuminate\Http\Request;

class CaptionController extends Controller
{
    public function index(){
        
        $result = caption_add::all();

        return response()->json($result);
    }

    public function update(Request $request,$id){
        
        $capcity=caption_add::find($id);
        $capcity->update($request->all());
        return response(true);

    }
}
