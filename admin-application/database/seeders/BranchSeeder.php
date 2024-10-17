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
            ['name' => 'CIMB Niaga Jakarta Pusat', 'type' => 'kc', 'address' => 'Jl. M.H. Thamrin No. 10, Jakarta Pusat', 'city' => 'Jakarta Pusat', 'province' => 'DKI Jakarta', 'cp' => '021-12345678', 'latitude' => -6.2088, 'longitude' => 106.8456, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 0, 'rate' => 4.5, 'is_deleted' => false, 'image_path' => 'images/branch1.jpg'],
            ['name' => 'CIMB Niaga Jakarta Barat', 'type' => 'kcs', 'address' => 'Jl. Daan Mogot No. 35, Jakarta Barat', 'city' => 'Jakarta Barat', 'province' => 'DKI Jakarta', 'cp' => '021-23456789', 'latitude' => -6.1831, 'longitude' => 106.7482, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 5, 'rate' => 4.2, 'is_deleted' => false, 'image_path' => 'images/branch2.jpg'],
            ['name' => 'CIMB Niaga Jakarta Selatan', 'type' => 'kcp_sb', 'address' => 'Jl. Rasuna Said No. 22, Jakarta Selatan', 'city' => 'Jakarta Selatan', 'province' => 'DKI Jakarta', 'cp' => '021-34567890', 'latitude' => -6.2296, 'longitude' => 106.8283, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 7, 'rate' => 4.7, 'is_deleted' => false, 'image_path' => 'images/branch3.jpg'],
            ['name' => 'CIMB Niaga Bogor', 'type' => 'kcp_dl', 'address' => 'Jl. Pajajaran No. 20, Bogor', 'city' => 'Bogor', 'province' => 'Jawa Barat', 'cp' => '0251-9876543', 'latitude' => -6.5940, 'longitude' => 106.7893, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 3, 'rate' => 4.0, 'is_deleted' => false, 'image_path' => 'images/branch4.jpg'],
            ['name' => 'CIMB Niaga Bekasi', 'type' => 'kc', 'address' => 'Jl. Kalimalang No. 100, Bekasi', 'city' => 'Bekasi', 'province' => 'Jawa Barat', 'cp' => '021-8765432', 'latitude' => -6.2340, 'longitude' => 106.9810, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 10, 'rate' => 4.3, 'is_deleted' => false, 'image_path' => 'images/branch5.jpg'],
            ['name' => 'CIMB Niaga Tangerang', 'type' => 'kc', 'address' => 'Jl. Raya Serpong No. 50, Tangerang', 'city' => 'Tangerang', 'province' => 'Banten', 'cp' => '021-5432167', 'latitude' => -6.1999, 'longitude' => 106.6519, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 8, 'rate' => 4.4, 'is_deleted' => false, 'image_path' => 'images/branch6.jpg'],
            ['name' => 'CIMB Niaga Depok', 'type' => 'kcs', 'address' => 'Jl. Margonda Raya No. 30, Depok', 'city' => 'Depok', 'province' => 'Jawa Barat', 'cp' => '021-7654321', 'latitude' => -6.3777, 'longitude' => 106.8266, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 4, 'rate' => 4.1, 'is_deleted' => false, 'image_path' => 'images/branch7.jpg'],
            ['name' => 'CIMB Niaga Bekasi Timur', 'type' => 'kcps', 'address' => 'Jl. Raya Timur No. 15, Bekasi', 'city' => 'Bekasi', 'province' => 'Jawa Barat', 'cp' => '021-6123456', 'latitude' => -6.1663, 'longitude' => 106.9834, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 2, 'rate' => 4.6, 'is_deleted' => false, 'image_path' => 'images/branch8.jpg'],
            ['name' => 'CIMB Niaga Bogor Selatan', 'type' => 'kc', 'address' => 'Jl. Batutulis No. 88, Bogor', 'city' => 'Bogor', 'province' => 'Jawa Barat', 'cp' => '0251-8765431', 'latitude' => -6.6046, 'longitude' => 106.8063, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 6, 'rate' => 4.4, 'is_deleted' => false, 'image_path' => 'images/branch9.jpg'],
            ['name' => 'CIMB Niaga Jakarta Timur', 'type' => 'kcp_dl', 'address' => 'Jl. Matraman Raya No. 29, Jakarta Timur', 'city' => 'Jakarta Timur', 'province' => 'DKI Jakarta', 'cp' => '021-6785432', 'latitude' => -6.2104, 'longitude' => 106.8775, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 5, 'rate' => 4.2, 'is_deleted' => false, 'image_path' => 'images/branch10.jpg'],
            ['name' => 'CIMB Niaga Tangerang Selatan', 'type' => 'kc', 'address' => 'Jl. Bintaro Utama No. 40, Tangerang Selatan', 'city' => 'Tangerang', 'province' => 'Banten', 'cp' => '021-6784321', 'latitude' => -6.2765, 'longitude' => 106.7158, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 3, 'rate' => 4.5, 'is_deleted' => false, 'image_path' => 'images/branch11.jpg'],
            ['name' => 'CIMB Niaga Cengkareng', 'type' => 'kc', 'address' => 'Jl. Outer Ring Road No. 55, Cengkareng', 'city' => 'Jakarta Barat', 'province' => 'DKI Jakarta', 'cp' => '021-6654321', 'latitude' => -6.1360, 'longitude' => 106.7548, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 9, 'rate' => 4.0, 'is_deleted' => false, 'image_path' => 'images/branch12.jpg'],
            ['name' => 'CIMB Niaga Tangerang Kota', 'type' => 'kc', 'address' => 'Jl. Sudirman No. 15, Tangerang', 'city' => 'Tangerang', 'province' => 'Banten', 'cp' => '021-7654323', 'latitude' => -6.1567, 'longitude' => 106.6281, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 8, 'rate' => 4.3, 'is_deleted' => false, 'image_path' => 'images/branch13.jpg'],
            ['name' => 'CIMB Niaga Jakarta Utara', 'type' => 'kc', 'address' => 'Jl. Pluit Selatan No. 99, Jakarta Utara', 'city' => 'Jakarta Utara', 'province' => 'DKI Jakarta', 'cp' => '021-9876543', 'latitude' => -6.1206, 'longitude' => 106.8060, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 4, 'rate' => 4.2, 'is_deleted' => false, 'image_path' => 'images/branch14.jpg'],
            ['name' => 'CIMB Niaga ATM Senayan City', 'type' => 'atm', 'address' => 'Jl. Asia Afrika No. 19, Jakarta', 'city' => 'Jakarta Pusat', 'province' => 'DKI Jakarta', 'cp' => '021-1234567', 'latitude' => -6.2245, 'longitude' => 106.7994, 'open_hour' => '00:00', 'close_hour' => '23:59', 'queue' => 0, 'rate' => 4.5, 'is_deleted' => false, 'image_path' => 'images/atm1.jpg'],
            ['name' => 'CIMB Niaga KC Sudirman', 'type' => 'kc', 'address' => 'Jl. Jend. Sudirman No. 40-46, Jakarta', 'city' => 'Jakarta Pusat', 'province' => 'DKI Jakarta', 'cp' => '021-6543210', 'latitude' => -6.2101, 'longitude' => 106.8227, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 5, 'rate' => 4.6, 'is_deleted' => false, 'image_path' => 'images/branch26.jpg'],
            ['name' => 'CIMB Niaga KCP Blok M', 'type' => 'kcp_dl', 'address' => 'Jl. Panglima Polim No. 102, Jakarta', 'city' => 'Jakarta Selatan', 'province' => 'DKI Jakarta', 'cp' => '021-5432109', 'latitude' => -6.2457, 'longitude' => 106.7982, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 4, 'rate' => 4.3, 'is_deleted' => false, 'image_path' => 'images/branch27.jpg'],
            ['name' => 'CIMB Niaga KCS Kelapa Gading', 'type' => 'kcs', 'address' => 'Jl. Boulevard Barat Raya No. 15, Jakarta', 'city' => 'Jakarta Utara', 'province' => 'DKI Jakarta', 'cp' => '021-7654321', 'latitude' => -6.1609, 'longitude' => 106.9066, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 6, 'rate' => 4.7, 'is_deleted' => false, 'image_path' => 'images/branch28.jpg'],
            ['name' => 'CIMB Niaga ATM Thamrin City', 'type' => 'cdm', 'address' => 'Jl. K.H. Mas Mansyur No. 121, Jakarta', 'city' => 'Jakarta Pusat', 'province' => 'DKI Jakarta', 'cp' => '021-8765432', 'latitude' => -6.1957, 'longitude' => 106.8144, 'open_hour' => '00:00', 'close_hour' => '23:59', 'queue' => 0, 'rate' => 4.4, 'is_deleted' => false, 'image_path' => 'images/atm2.jpg'],
            ['name' => 'CIMB Niaga KC Bogor', 'type' => 'kc', 'address' => 'Jl. Pajajaran No. 50, Bogor', 'city' => 'Bogor', 'province' => 'Jawa Barat', 'cp' => '0251-1234567', 'latitude' => -6.5950, 'longitude' => 106.8077, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 3, 'rate' => 4.5, 'is_deleted' => false, 'image_path' => 'images/branch29.jpg'],
            ['name' => 'CIMB Niaga KCP Depok', 'type' => 'kc', 'address' => 'Jl. Margonda Raya No. 12, Depok', 'city' => 'Depok', 'province' => 'Jawa Barat', 'cp' => '021-8765432', 'latitude' => -6.3747, 'longitude' => 106.8329, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 4, 'rate' => 4.3, 'is_deleted' => false, 'image_path' => 'images/branch30.jpg'],
            ['name' => 'CIMB Niaga ATM BSD Plaza', 'type' => 'cdm', 'address' => 'Jl. BSD Raya Utama No. 18, Tangerang', 'city' => 'Tangerang', 'province' => 'Banten', 'cp' => '021-6543210', 'latitude' => -6.3000, 'longitude' => 106.6500, 'open_hour' => '00:00', 'close_hour' => '23:59', 'queue' => 0, 'rate' => 4.7, 'is_deleted' => false, 'image_path' => 'images/atm3.jpg'],
            ['name' => 'CIMB Niaga KC Bekasi', 'type' => 'kc', 'address' => 'Jl. Ahmad Yani No. 12, Bekasi', 'city' => 'Bekasi', 'province' => 'Jawa Barat', 'cp' => '021-7654321', 'latitude' => -6.2422, 'longitude' => 106.9931, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 7, 'rate' => 4.2, 'is_deleted' => false, 'image_path' => 'images/branch31.jpg'],
            ['name' => 'CIMB Niaga KCS Tangerang', 'type' => 'kcs', 'address' => 'Jl. Merdeka No. 50, Tangerang', 'city' => 'Tangerang', 'province' => 'Banten', 'cp' => '021-5432109', 'latitude' => -6.1753, 'longitude' => 106.6287, 'open_hour' => '08:00', 'close_hour' => '15:00', 'queue' => 5, 'rate' => 4.6, 'is_deleted' => false, 'image_path' => 'images/branch32.jpg'],
            ['name' => 'CIMB Niaga ATM Central Park Mall', 'type' => 'atm', 'address' => 'Jl. Letjen S. Parman Kav. 28, Jakarta Barat', 'city' => 'Jakarta', 'province' => 'DKI Jakarta', 'cp' => '021-9876543', 'latitude' => -6.1766, 'longitude' => 106.7908, 'open_hour' => '00:00', 'close_hour' => '23:59', 'queue' => 0, 'rate' => 4.8, 'is_deleted' => false, 'image_path' => 'images/atm4.jpg'],
            ['name' => 'CIMB Niaga ATM Plaza Senayan', 'type' => 'atm', 'address' => 'Jl. Asia Afrika No. 8, Jakarta', 'city' => 'Jakarta Pusat', 'province' => 'DKI Jakarta', 'cp' => '021-1234568', 'latitude' => -6.2255, 'longitude' => 106.7993, 'open_hour' => '00:00', 'close_hour' => '23:59', 'queue' => 0, 'rate' => 4.6, 'is_deleted' => false, 'image_path' => 'images/atm5.jpg'],
            ['name' => 'CIMB Niaga ATM Kota Kasablanka', 'type' => 'atm', 'address' => 'Jl. Casablanca Raya No. 88, Jakarta', 'city' => 'Jakarta Selatan', 'province' => 'DKI Jakarta', 'cp' => '021-7654321', 'latitude' => -6.2234, 'longitude' => 106.8475, 'open_hour' => '00:00', 'close_hour' => '23:59', 'queue' => 0, 'rate' => 4.9, 'is_deleted' => false, 'image_path' => 'images/atm6.jpg'],
            ['name' => 'CIMB Niaga ATM AEON Mall BSD', 'type' => 'atm', 'address' => 'Jl. BSD Raya Utama, Tangerang', 'city' => 'Tangerang', 'province' => 'Banten', 'cp' => '021-8765434', 'latitude' => -6.3022, 'longitude' => 106.6527, 'open_hour' => '00:00', 'close_hour' => '23:59', 'queue' => 0, 'rate' => 4.7, 'is_deleted' => false, 'image_path' => 'images/atm7.jpg'],
            ['name' => 'CIMB Niaga ATM Mall Ciputra', 'type' => 'atm', 'address' => 'Jl. Arteri S. Parman No. 1, Jakarta', 'city' => 'Jakarta Barat', 'province' => 'DKI Jakarta', 'cp' => '021-5432109', 'latitude' => -6.1682, 'longitude' => 106.7857, 'open_hour' => '00:00', 'close_hour' => '23:59', 'queue' => 0, 'rate' => 4.5, 'is_deleted' => false, 'image_path' => 'images/atm8.jpg']
        ];

        DB::table('branches')->insert($branches);
    }
}
