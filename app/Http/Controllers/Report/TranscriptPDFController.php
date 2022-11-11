<?php

namespace App\Http\Controllers\Report;

use App\Exports\TranscriptExport;
use App\Http\Controllers\Controller;
use App\Models\caption_add;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class TranscriptPDFController extends Controller
{
    public function trans()
    {
        $result = DB::table('caption_adds')
        ->select('caption_adds.caption')
        ->get();

        return $result;
    }
    public function export()    
    {
        $data = [
            'title' => 'EduXpert Transcript',
            'date' => date('m/d/Y'),
            'transcript'=>DB::table('caption_adds')
                        ->select('caption_adds.caption')
                        ->get()
        ];
          
        $pdf = PDF::loadView('myPDF', $data);
    
        return $pdf->download('EduXpert.pdf');
    }
}
