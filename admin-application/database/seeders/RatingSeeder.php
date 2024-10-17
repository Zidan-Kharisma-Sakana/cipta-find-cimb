<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rating = [
            ['branch_id' => '1', 'rating' => '4', 'review' => NULL],
            ['branch_id' => '1', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '1', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '3', 'rating' => '5', 'review' => NULL],
            ['branch_id' => '3', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '3', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '4', 'rating' => '4', 'review' => NULL],
            ['branch_id' => '4', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '4', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '5', 'rating' => '5', 'review' => NULL],
            ['branch_id' => '5', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '5', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '6', 'rating' => '4', 'review' => NULL],
            ['branch_id' => '6', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '6', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '7', 'rating' => '5', 'review' => NULL],
            ['branch_id' => '7', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '7', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '8', 'rating' => '4', 'review' => NULL],
            ['branch_id' => '8', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '8', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '9', 'rating' => '5', 'review' => NULL],
            ['branch_id' => '9', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '9', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '10', 'rating' => '4', 'review' => NULL],
            ['branch_id' => '10', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '10', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '11', 'rating' => '5', 'review' => NULL],
            ['branch_id' => '11', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '11', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '12', 'rating' => '4', 'review' => NULL],
            ['branch_id' => '12', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '12', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '13', 'rating' => '5', 'review' => NULL],
            ['branch_id' => '13', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '13', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '14', 'rating' => '4', 'review' => NULL],
            ['branch_id' => '14', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '14', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '15', 'rating' => '5', 'review' => NULL],
            ['branch_id' => '15', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '15', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '16', 'rating' => '4', 'review' => NULL],
            ['branch_id' => '16', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '16', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '17', 'rating' => '5', 'review' => NULL],
            ['branch_id' => '17', 'rating' => '4', 'review' => 'Good'],
            ['branch_id' => '17', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '18', 'rating' => '4', 'review' => NULL],
            ['branch_id' => '18', 'rating' => '5', 'review' => 'Great service!'],
            ['branch_id' => '18', 'rating' => '3', 'review' => NULL],

        ];

        DB::table('ratings')->insert($rating);
    }
}
