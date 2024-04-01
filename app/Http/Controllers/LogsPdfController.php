<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ActivityLog;
// use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Spatie\Activitylog\Models\Activity;
use  PDF;
class LogsPdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{

    $logs = Activity::all();

    $pdf = PDF::loadView('pdf.reports', compact('logs'), [], [
        'format' => 'A4'
    ]);

    $pdf->save( storage_path('app/public/' .'log_type' . time().'.pdf' ));

    //  return $pdf->download('Activity_logs.pdf');


}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
