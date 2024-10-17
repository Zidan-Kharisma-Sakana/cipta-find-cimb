<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            ['name' => 'CIMB Niaga Jakarta Pusat', 'type' => 'kc', 'address' => 'Jl. M.H. Thamrin No. 10, Jakarta Pusat', 'city' => 'Jakarta', 'province' => 'DKI Jakarta', 'cp' => '021-12345678', 'latitude' => -6.2088, 'longitude' => 106.8456, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 0, 'rate' => 4.5, 'is_delete' => false, 'image_path' => 'images/branch1.jpg'],
            ['name' => 'CIMB Niaga Jakarta Barat', 'type' => 'kc', 'address' => 'Jl. Daan Mogot No. 35, Jakarta Barat', 'city' => 'Jakarta', 'province' => 'DKI Jakarta', 'cp' => '021-23456789', 'latitude' => -6.1831, 'longitude' => 106.7482, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 5, 'rate' => 4.2, 'is_delete' => false, 'image_path' => 'images/branch2.jpg'],
            ['name' => 'CIMB Niaga Jakarta Selatan', 'type' => 'kc', 'address' => 'Jl. Rasuna Said No. 22, Jakarta Selatan', 'city' => 'Jakarta', 'province' => 'DKI Jakarta', 'cp' => '021-34567890', 'latitude' => -6.2296, 'longitude' => 106.8283, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 7, 'rate' => 4.7, 'is_delete' => false, 'image_path' => 'images/branch3.jpg'],
            ['name' => 'CIMB Niaga Bogor', 'type' => 'kc', 'address' => 'Jl. Pajajaran No. 20, Bogor', 'city' => 'Bogor', 'province' => 'Jawa Barat', 'cp' => '0251-9876543', 'latitude' => -6.5940, 'longitude' => 106.7893, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 3, 'rate' => 4.0, 'is_delete' => false, 'image_path' => 'images/branch4.jpg'],
            ['name' => 'CIMB Niaga Bekasi', 'type' => 'kc', 'address' => 'Jl. Kalimalang No. 100, Bekasi', 'city' => 'Bekasi', 'province' => 'Jawa Barat', 'cp' => '021-8765432', 'latitude' => -6.2340, 'longitude' => 106.9810, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 10, 'rate' => 4.3, 'is_delete' => false, 'image_path' => 'images/branch5.jpg'],
            ['name' => 'CIMB Niaga Tangerang', 'type' => 'kc', 'address' => 'Jl. Raya Serpong No. 50, Tangerang', 'city' => 'Tangerang', 'province' => 'Banten', 'cp' => '021-5432167', 'latitude' => -6.1999, 'longitude' => 106.6519, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 8, 'rate' => 4.4, 'is_delete' => false, 'image_path' => 'images/branch6.jpg'],
            ['name' => 'CIMB Niaga Depok', 'type' => 'kc', 'address' => 'Jl. Margonda Raya No. 30, Depok', 'city' => 'Depok', 'province' => 'Jawa Barat', 'cp' => '021-7654321', 'latitude' => -6.3777, 'longitude' => 106.8266, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 4, 'rate' => 4.1, 'is_delete' => false, 'image_path' => 'images/branch7.jpg'],
            ['name' => 'CIMB Niaga Bekasi Timur', 'type' => 'kc', 'address' => 'Jl. Raya Timur No. 15, Bekasi', 'city' => 'Bekasi', 'province' => 'Jawa Barat', 'cp' => '021-6123456', 'latitude' => -6.1663, 'longitude' => 106.9834, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 2, 'rate' => 4.6, 'is_delete' => false, 'image_path' => 'images/branch8.jpg'],
            ['name' => 'CIMB Niaga Bogor Selatan', 'type' => 'kc', 'address' => 'Jl. Batutulis No. 88, Bogor', 'city' => 'Bogor', 'province' => 'Jawa Barat', 'cp' => '0251-8765431', 'latitude' => -6.6046, 'longitude' => 106.8063, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 6, 'rate' => 4.4, 'is_delete' => false, 'image_path' => 'images/branch9.jpg'],
            ['name' => 'CIMB Niaga Jakarta Timur', 'type' => 'kc', 'address' => 'Jl. Matraman Raya No. 29, Jakarta Timur', 'city' => 'Jakarta', 'province' => 'DKI Jakarta', 'cp' => '021-6785432', 'latitude' => -6.2104, 'longitude' => 106.8775, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 5, 'rate' => 4.2, 'is_delete' => false, 'image_path' => 'images/branch10.jpg'],
            ['name' => 'CIMB Niaga Tangerang Selatan', 'type' => 'kc', 'address' => 'Jl. Bintaro Utama No. 40, Tangerang Selatan', 'city' => 'Tangerang', 'province' => 'Banten', 'cp' => '021-6784321', 'latitude' => -6.2765, 'longitude' => 106.7158, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 3, 'rate' => 4.5, 'is_delete' => false, 'image_path' => 'images/branch11.jpg'],
            ['name' => 'CIMB Niaga Cengkareng', 'type' => 'kc', 'address' => 'Jl. Outer Ring Road No. 55, Cengkareng', 'city' => 'Jakarta', 'province' => 'DKI Jakarta', 'cp' => '021-6654321', 'latitude' => -6.1360, 'longitude' => 106.7548, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 9, 'rate' => 4.0, 'is_delete' => false, 'image_path' => 'images/branch12.jpg'],
            ['name' => 'CIMB Niaga Tangerang Kota', 'type' => 'kc', 'address' => 'Jl. Sudirman No. 15, Tangerang', 'city' => 'Tangerang', 'province' => 'Banten', 'cp' => '021-7654323', 'latitude' => -6.1567, 'longitude' => 106.6281, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 8, 'rate' => 4.3, 'is_delete' => false, 'image_path' => 'images/branch13.jpg'],
            ['name' => 'CIMB Niaga Jakarta Utara', 'type' => 'kc', 'address' => 'Jl. Pluit Selatan No. 99, Jakarta Utara', 'city' => 'Jakarta', 'province' => 'DKI Jakarta', 'cp' => '021-9876543', 'latitude' => -6.1206, 'longitude' => 106.8060, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 4, 'rate' => 4.2, 'is_delete' => false, 'image_path' => 'images/branch14.jpg'],
            ['name' => 'CIMB Niaga Semarang', 'type' => 'kc', 'address' => 'Jl. Pandanaran No. 45, Semarang', 'city' => 'Semarang', 'province' => 'Jawa Tengah', 'cp' => '024-6543210', 'latitude' => -6.9824, 'longitude' => 110.4075, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 5, 'rate' => 4.3, 'is_delete' => false, 'image_path' => 'images/branch15.jpg'],
            ['name' => 'CIMB Niaga Bandung', 'type' => 'kc', 'address' => 'Jl. Asia Afrika No. 25, Bandung', 'city' => 'Bandung', 'province' => 'Jawa Barat', 'cp' => '022-5432109', 'latitude' => -6.9209, 'longitude' => 107.6061, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 6, 'rate' => 4.5, 'is_delete' => false, 'image_path' => 'images/branch16.jpg'],
            ['name' => 'CIMB Niaga Surabaya', 'type' => 'kc', 'address' => 'Jl. Tunjungan No. 100, Surabaya', 'city' => 'Surabaya', 'province' => 'Jawa Timur', 'cp' => '031-7654321', 'latitude' => -7.2621, 'longitude' => 112.7400, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 8, 'rate' => 4.7, 'is_delete' => false, 'image_path' => 'images/branch15.jpg'],
            ['name' => 'CIMB Niaga Denpasar', 'type' => 'kc', 'address' => 'Jl. Gatot Subroto No. 25, Denpasar', 'city' => 'Denpasar', 'province' => 'Bali', 'cp' => '0361-8765432', 'latitude' => -8.6562, 'longitude' => 115.2165, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 2, 'rate' => 4.9, 'is_delete' => false, 'image_path' => 'images/branch18.jpg'],
            ['name' => 'CIMB Niaga Yogyakarta', 'type' => 'kc', 'address' => 'Jl. Malioboro No. 88, Yogyakarta', 'city' => 'Yogyakarta', 'province' => 'DIY', 'cp' => '0274-6543210', 'latitude' => -7.7956, 'longitude' => 110.3695, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 5, 'rate' => 4.6, 'is_delete' => false, 'image_path' => 'images/branch19.jpg'],
            ['name' => 'CIMB Niaga Palembang', 'type' => 'kc', 'address' => 'Jl. Jenderal Sudirman No. 45, Palembang', 'city' => 'Palembang', 'province' => 'Sumatera Selatan', 'cp' => '0711-6543210', 'latitude' => -2.9761, 'longitude' => 104.7754, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 3, 'rate' => 4.0, 'is_delete' => false, 'image_path' => 'images/branch20.jpg'],
            ['name' => 'CIMB Niaga Medan', 'type' => 'kc', 'address' => 'Jl. Gatot Subroto No. 100, Medan', 'city' => 'Medan', 'province' => 'Sumatera Utara', 'cp' => '061-7654321', 'latitude' => 3.5952, 'longitude' => 98.6722, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 9, 'rate' => 4.1, 'is_delete' => false, 'image_path' => 'images/branch21.jpg'],
            ['name' => 'CIMB Niaga Malang', 'type' => 'kc', 'address' => 'Jl. Kawi No. 50, Malang', 'city' => 'Malang', 'province' => 'Jawa Timur', 'cp' => '0341-5432109', 'latitude' => -7.9788, 'longitude' => 112.6282, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 3, 'rate' => 4.7, 'is_delete' => false, 'image_path' => 'images/branch22.jpg'],
            ['name' => 'CIMB Niaga Samarinda', 'type' => 'kc', 'address' => 'Jl. Gajah Mada No. 25, Samarinda', 'city' => 'Samarinda', 'province' => 'Kalimantan Timur', 'cp' => '0541-8765432', 'latitude' => -0.5021, 'longitude' => 115.1536, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 4, 'rate' => 4.8, 'is_delete' => false, 'image_path' => 'images/branch23.jpg'],
            ['name' => 'CIMB Niaga Makassar', 'type' => 'kc', 'address' => 'Jl. A.P. Pettarani No. 77, Makassar', 'city' => 'Makassar', 'province' => 'Sulawesi Selatan', 'cp' => '0411-6543210', 'latitude' => -5.1477, 'longitude' => 119.4327, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 6, 'rate' => 4.4, 'is_delete' => false, 'image_path' => 'images/branch24.jpg'],
            ['name' => 'CIMB Niaga Pekanbaru', 'type' => 'kc', 'address' => 'Jl. Sudirman No. 88, Pekanbaru', 'city' => 'Pekanbaru', 'province' => 'Riau', 'cp' => '0761-8765432', 'latitude' => 0.5339, 'longitude' => 101.4489, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 3, 'rate' => 4.6, 'is_delete' => false, 'image_path' => 'images/branch25.jpg'],
        ];

        DB::table('branches')->insert($branches);
    }
}
