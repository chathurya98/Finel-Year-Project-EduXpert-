<?php

namespace App\Exports;

use App\Models\caption_add;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class TranscriptExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $result = DB::table('caption_adds')
                    ->select('caption_adds.caption')
                    ->get();

        return $result;
    }
}
