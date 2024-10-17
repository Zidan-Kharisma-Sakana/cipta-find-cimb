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
            return (new BranchResource(false, "Internal Serverrr Error", null))->response()->setStatusCode(500);
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
            return (new BranchResource(false, "Internal Serverrr Error", null))->response()->setStatusCode(500);
        }
    }

    public function showNearby(Request $request)
{
    $request->validate([
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'distance' => 'nullable|numeric', // Default distance threshold, if needed
    ]);

    $latitude = $request->input('latitude');
    $longitude = $request->input('longitude');
    $distance = $request->input('distance', 50); // Default distance threshold (optional)
    $limit = 5;

    try {
        $nearbyBranches = Branch::select(
            '*',
            DB::raw("ABS(latitude - $latitude) + ABS(longitude - $longitude) AS distance")
        )
        ->orderBy('distance')
        ->limit($limit)
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Nearby branches found',
            'data' => $nearbyBranches,
        ], 200);
    } catch (\Exception $e) {
        Log::error('Error fetching nearby branches: ' . $e->getMessage());

        return response()->json([
            'success' => false,
            'message' => 'Internal Serverrrrr Error',
            'data' => null,
        ], 500);
    }
}

    public function incrementQueue($id)
    {
        try {
            $branch = Branch::findOrFail($id);

            $branch->queue += 1;

            $branch->save();

            return response()->json([
                'success' => true,
                'message' => 'Queue incremented successfully',
                'data' => $branch,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error incrementing queue: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Internal Server Error',
                'data' => null,
            ], 500);
        }
    }

    public function decrementQueue($id)
{
    try {
        $branch = Branch::findOrFail($id);

        if ($branch->queue > 0) {
            $branch->queue -= 1;
            $branch->save();

            return response()->json([
                'success' => true,
                'message' => 'Queue decremented successfully',
                'data' => $branch,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Queue cannot be less than zero',
                'data' => $branch,
            ], 400);
        }
    } catch (\Exception $e) {
        Log::error('Error decrementing queue: ' . $e->getMessage());

        return response()->json([
            'success' => false,
            'message' => 'Internal Server Error',
            'data' => null,
        ], 500);
    }
}

}
