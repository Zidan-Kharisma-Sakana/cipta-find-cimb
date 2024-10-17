<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        // return new BranchResource(true, 'OK', Branch::where('is_deleted', false)->get());
        try {
            $branch = Branch::where('is_deleted', false)
                ->whereIn('type', ['kc', 'kcs', 'kcp_sb', 'kcp_dl', 'kcps'])
                ->get();
            if ($branch->isEmpty()) return (new BranchResource(false, 'Data Not Found', null))->response()->setStatusCode(404);
            return new BranchResource(true, 'OK', $branch);
        } catch (Exception $exception) {
            return (new BranchResource(false, "Internal Server Error", null))->response()->setStatusCode(500);
        }
    }

    public function show(string $id)
    {
        try {
            $branch = Branch::find($id);
            if (!$branch) return (new BranchResource(false, 'Not Found', null))->response()->setStatusCode(404);
            return (new BranchResource(true, 'OK', $branch))
                ->response()
                ->setStatusCode(200);
        } catch (Exception $exception) {
            return (new BranchResource(false, "Internal Server Error", null))->response()->setStatusCode(500);
        }
    }

    public function getFilteredBranch(Request $request)
    {
        try {
            $branchs = Branch::where('is_deleted', false)
                ->whereIn('type', ['kc', 'kcs', 'kcp_sb', 'kcp_dl', 'kcps']);

            if ($request->has('name')) $branchs->where('name', 'LIKE', "%{$request->name}%");
            if ($request->has('city')) $branchs->where('city', 'LIKE', "%{$request->city}%");
            if ($request->has('province')) $branchs->where('province', 'LIKE', "%{$request->province}%");
            if ($request->has('type')) $branchs->where('type', $request->type);

            $result = $branchs->get();

            if ($result->isEmpty()) {
                return (new BranchResource(false, 'Not Found', null))->response()->setStatusCode(404);
            }

            return (new BranchResource(true, 'OK', $result))
                ->response()
                ->setStatusCode(200);
        } catch (Exception $exception) {
            return (new BranchResource(false, "Internal Server Error", null))->response()->setStatusCode(500);
        }
    }

    public function showAllATM()
    {
        try {
            $atm = Branch::where('is_deleted', false)
                ->whereIn('type', ['atm', 'cdm', 'tst'])
                ->get();
            if ($atm->isEmpty()) return (new BranchResource(false, 'Data Not Found', null))->response()->setStatusCode(404);
            return new BranchResource(true, 'OK', $atm);
        } catch (Exception $exception) {
            return (new BranchResource(false, "Internal Server Error", null))->response()->setStatusCode(500);
        }
    }

    public function getFilteredATM(Request $request)
    {
        try {
            $branchs = Branch::where('is_deleted', false)
                ->whereIn('type', ['atm', 'cdm', 'tst']);

            if ($request->has('city')) $branchs->where('city', 'LIKE', "%{$request->city}%");
            if ($request->has('province')) $branchs->where('province', 'LIKE', "%{$request->province}%");

            $result = $branchs->get();

            if ($result->isEmpty()) {
                return (new BranchResource(false, 'Not Found', null))->response()->setStatusCode(404);
            }

            return (new BranchResource(true, 'OK', $result))
                ->response()
                ->setStatusCode(200);
        } catch (Exception $exception) {
            return (new BranchResource(false, "Internal Server Error", null))->response()->setStatusCode(500);
        }
    }
}
