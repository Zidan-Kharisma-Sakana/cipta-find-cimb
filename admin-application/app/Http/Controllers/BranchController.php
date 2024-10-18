<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $validateBranch = $request->validate([
            "name"=>'required',
            "type"=>'required',
            "address"=>'required',
            "city"=>'required',
            "province"=>'required',
            "cp"=>'required',
            "latitude"=>'required',
            "longitude"=>'required',
            "open_hour"=>'required',
            "close_hour"=>'required',
            "service_desc"=>'required',
            "image_path"=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validateBranch['service_desc'] = implode(', ', $validateBranch['service_desc']);

        if($request->file('image_path')){
            $validateBranch['image_path'] = $request->file('image_path')->store('branch-images');
        }

        Branch::create($validateBranch);
        return redirect('/branch')->with('storeBranchSuccess', 'Data berhasil disimpan!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return view('branch.show', ['title' => 'Detail Kantor Cabang', 'branch' => $branch]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        $serviceList = explode(', ', $branch->service_desc);
        $allService = ['Tabungan', 'Kartu Kredit', 'KPR', 'KTA', 'Reksadana', 'BancAssurance', 'Wakaf', 'Treasury', 'Kartu Debit'];
        return view('branch.edit', ['title' => 'Edit Kantor Cabang', 'branch' => $branch, 'serviceList' => $serviceList, 'allService' => $allService]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $validateBranch = $request->validate([
            "name"=>'required',
            "type"=>'required',
            "address"=>'required',
            "city"=>'required',
            "province"=>'required',
            "cp"=>'required',
            "latitude"=>'required',
            "longitude"=>'required',
            "open_hour"=>'required',
            "close_hour"=>'required',
            "service_desc"=>'required',
        ]);

        $validateBranch['service_desc'] = implode(', ', $validateBranch['service_desc']);


        if($request->file('image_path')){
            if($request->old_image){
                Storage::delete($request->old_image);
            }
            $validateBranch['image_path'] = $request->file('image_path')->store('branch-images');
        }

        Branch::where('id', $branch->id)->update($validateBranch); 
        return redirect('/branch')->with('updateBranchSuccess', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        Branch::where('id', $branch->id)->update(['is_deleted' => $branch->is_deleted == true ? false : true]);
        return redirect('/branch')->with('destroyBranchSuccess', 'Brnach status diubah!'); 
    }

    public function branchData(Request $request)
    {
        $eloquentQuery = Branch::get();

        return DataTables::of($eloquentQuery)
        ->setRowId('{{$id}}')
        ->editColumn('opHour', function ($row) {
            return $row->open_hour . ' - ' . $row->close_hour;})
        ->editColumn('is_deleted', function ($row) {
            return $row->is_deleted ? 'YA' : 'TIDAK' ;})
        ->make(true);
    }
}
