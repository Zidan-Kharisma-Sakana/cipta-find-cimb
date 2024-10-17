<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use Exception;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        dd($request->province);
        return new BranchResource(true, 'OK', Branch::all());
    }

    public function show(string $id)
    {
        try{
            $branch = Branch::find($id);
            if(!$branch) return (new BranchResource(false, 'Not Found', null))->response()->setStatusCode(404);
            return new BranchResource(true, 'OK', $branch);
        }catch(Exception $exception){
            return (new BranchResource(false, "Internal Server Error", null))->response()->setStatusCode(500);
        }
    }
}
