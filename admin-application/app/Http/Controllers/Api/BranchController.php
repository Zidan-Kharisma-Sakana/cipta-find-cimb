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
            // Base query untuk branch yang tidak dihapus dan memiliki tipe tertentu
            $branchs = Branch::where('is_deleted', false)
                ->whereIn('type', ['kc', 'kcs', 'kcp_sb', 'kcp_dl', 'kcps']);

            // Ubah input user menjadi lowercase untuk pengecekan case-insensitive
            if ($request->has('name')) {
                $name = strtolower($request->name);
                $branchs->whereRaw('LOWER(name) LIKE ?', ["%{$name}%"]);
            }
            if ($request->has('city')) {
                $city = strtolower($request->city);
                $branchs->whereRaw('LOWER(city) LIKE ?', ["%{$city}%"]);
            }
            if ($request->has('province')) {
                $province = strtolower($request->province);
                $branchs->whereRaw('LOWER(province) LIKE ?', ["%{$province}%"]);
            }
            if ($request->has('type')) {
                $type = strtolower($request->type);
                $branchs->whereRaw('LOWER(type) = ?', [$type]);
            }

            // Eksekusi query untuk mendapatkan hasilnya
            $result = $branchs->get();

            // Jika hasil kosong, kembalikan respons 404
            // if ($result->isEmpty()) {
            //     return (new BranchResource(true, 'Not Found', null))->response()->setStatusCode(404);
            // }

            // Kembalikan hasil dengan status 200
            return (new BranchResource(true, 'OK', $result))
                ->response()
                ->setStatusCode(200);
        } catch (Exception $exception) {
            // Tangani error dan kembalikan respons 500 jika terjadi exception
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

            // Ubah input user menjadi lowercase untuk pengecekan case-insensitive
            if ($request->has('name')) {
                $name = strtolower($request->name);
                $branchs->whereRaw('LOWER(name) LIKE ?', ["%{$name}%"]);
            }
            if ($request->has('city')) {
                $city = strtolower($request->city);
                $branchs->whereRaw('LOWER(city) LIKE ?', ["%{$city}%"]);
            }
            if ($request->has('province')) {
                $province = strtolower($request->province);
                $branchs->whereRaw('LOWER(province) LIKE ?', ["%{$province}%"]);
            }

            $result = $branchs->get();

            // if ($result->isEmpty()) {
            //     return (new BranchResource(false, 'Not Found', null))->response()->setStatusCode(404);
            // }

            return (new BranchResource(true, 'OK', $result))
                ->response()
                ->setStatusCode(200);
        } catch (Exception $exception) {
            return (new BranchResource(false, "Internal Serverrr Error", null))->response()->setStatusCode(500);
        }
    }

    public function showNearbyBranch(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'distance' => 'nullable|numeric',
        ]);

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $distance = $request->input('distance', 50);
        $limit = 5;

        try {
            $nearbyBranches = Branch::select(
                '*',
                DB::raw("ABS(latitude - $latitude) + ABS(longitude - $longitude) AS distance")
            )
                ->whereIn('type', ['kc', 'kcs', 'kcp_sb', 'kcp_dl', 'kcps'])
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
                'message' => 'Internal Server Error',
                'data' => null,
            ], 500);
        }
    }

    public function showNearbyAtm(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'distance' => 'nullable|numeric',
        ]);

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $distance = $request->input('distance', 50);
        $limit = 5;

        try {
            $nearbyBranches = Branch::select(
                '*',
                DB::raw("ABS(latitude - $latitude) + ABS(longitude - $longitude) AS distance")
            )
                ->whereIn('type', ['atm', 'cdm', 'tst'])
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
                'message' => 'Internal Server Error',
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
