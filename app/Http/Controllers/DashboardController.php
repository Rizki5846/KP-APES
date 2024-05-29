<?php

namespace App\Http\Controllers;

use App\Models\DetailPoin;
use App\Models\InputPelanggaran;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Use the correct table name 'detail_poin'
        $siswaPoinTertinggi = InputPelanggaran::select('nis', DB::raw('SUM(pelanggarans.poin) as total_poin'))
            ->join('pelanggarans', 'detail_poin.id_pelanggaran', '=', 'pelanggarans.id')
            ->groupBy('nis')
            ->orderByDesc('total_poin')
            ->first();

        // Pass data to the view
        return view('dashboard', compact('siswaPoinTertinggi'));
    }
    
    
}
