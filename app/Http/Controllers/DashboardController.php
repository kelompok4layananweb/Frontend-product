<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $series1 = 72;
        $series2 = 72;
        $series3 = 72;

        $approvals = collect([
            (object)[
                'document_name' => 'Dokumen Pengajuan Proyek A',
                'company_name' => 'PT ABC',
                'status' => 'pending'
            ],
            (object)[
                'document_name' => 'Dokumen Pengajuan Proyek B',
                'company_name' => 'PT XYZ',
                'status' => 'approved'
            ],
            (object)[
                'document_name' => 'Dokumen Pengajuan Proyek C',
                'company_name' => 'PT DEF',
                'status' => 'rejected'
            ],
        ]);

        return view('pages.dashboard', compact ('series1', 'series2', 'series3','approvals'));
    }
}
