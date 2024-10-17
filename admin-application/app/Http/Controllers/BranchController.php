<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();
        return view ('branch.index', ['title' => 'Kantor Cabang', 'branches' => $branches]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('branch.create', ['title' => 'Kantor Cabang']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd('store');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $branch = Branch::find($id);
        return view('branch.show', ['title' => 'Branch Detail', 'branch' => $branch]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $boatClassId)
    {
        return view ('branch.edit', ['title' => 'Kantor Cabang']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $boatClassId)
    {
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $boatClassId)
    {
        dd('delete');
    }

    public function branchData(Request $request)
    {
        $eloquentQuery = Branch::get();

        return DataTables::of($eloquentQuery)
        ->setRowId('{{$id}}')
        ->editColumn('opHour', function ($row) {
            return $row->open_hour . ' - ' . $row->close_hour;})
        ->editColumn('isDeleted', function ($row) {
            return $row->isDeleted ? 'YA' : 'TIDAK' ;})
        ->make(true);
    }
}
