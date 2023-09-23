<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $per_page = $request->get('per_page',25);
        $reports = Report::paginate($per_page);
        return response()->json($reports);
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
    public function store(ReportRequest $request)
    {
        //
        $report = Report::create($request->all());
        return response()->json($report,201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $report = Report::findOrfail($id);
        return response()->json($report);
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
    public function update(ReportRequest $request, string $id)
    {
        //
        $report = Report::findOrfail($id);
        $report->update($request->all());
        return response()->json($report);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $report = Report::findOrfail($id);
        $report->delete();
        return response()->json(null,204);
    }
}
