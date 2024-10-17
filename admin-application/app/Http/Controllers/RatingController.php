<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function showAllRating()
    {
        $user = Rating::all();

        if ($user->isEmpty()) {
            return response()->json([
                'status_code' => 404,
                'message' => 'Data not found',
            ], 404);
        }

        return response()->json([
            'status_code' => 200,
            'message' => 'Success',
            'data' => $user,
        ], 200);
    }

    public function showAllRatingByBranch(string $id)
    {
        $user = Rating::where('branch_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($user->isEmpty()) {
            return response()->json([
                'status_code' => 404,
                'message' => 'Data not found',
            ], 404);
        }

        return response()->json([
            'status_code' => 200,
            'message' => 'Success',
            'data' => $user,
        ], 200);
    }

    public function storeRating(Request $request, string $id)
    {
        try {
            // Validasi input dari request
            $request->validate([
                'rating' => 'required|numeric',
                'review' => 'nullable|string', // review bisa nullable
            ]);

            // Simpan data rating ke database
            $rating = new Rating();
            $rating->branch_id = $id;
            $rating->rating = $request->rating;
            $rating->review = $request->input('review', null); // set review sebagai null jika tidak ada input
            $rating->save();

            // Return response jika berhasil
            return response()->json([
                'status_code' => 200,
                'message' => 'Success',
                'data' => $rating,
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangani error validasi
            return response()->json([
                'status_code' => 422,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            // Tangani error umum lainnya
            return response()->json([
                'status_code' => 500,
                'message' => 'An error occurred while saving the rating',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
