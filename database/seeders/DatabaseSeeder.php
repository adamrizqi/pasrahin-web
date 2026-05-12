<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create demo users for each role
        $customer = User::create([
            'name' => 'Budi Customer',
            'email' => 'customer@pasrahin.id',
            'password' => bcrypt('password'),
            'role' => 'customer',
        ]);

        $mitra = User::create([
            'name' => 'Andi Mitra',
            'email' => 'mitra@pasrahin.id',
            'password' => bcrypt('password'),
            'role' => 'mitra',
        ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@pasrahin.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create sample orders across different statuses
        Order::create([
            'customer_id' => $customer->id,
            'service_type' => 'makanan',
            'details' => 'Nasi goreng 2 porsi + es teh dari Warteg Bang Jago',
            'pickup_location' => 'Warteg Bang Jago, depan gerbang kampus',
            'dropoff_location' => 'Kos Griya Indah, Kamar 12',
            'bid_price' => 15000,
            'admin_fee' => 1000,
            'status' => 'pending',
        ]);

        Order::create([
            'customer_id' => $customer->id,
            'service_type' => 'print',
            'details' => 'Print tugas kuliah 20 lembar bolak-balik, warna',
            'pickup_location' => 'Fotokopi Jaya, Jl. Kampus No. 3',
            'dropoff_location' => 'Gedung Kuliah B, Lantai 2',
            'bid_price' => 10000,
            'admin_fee' => 1000,
            'status' => 'pending',
        ]);

        Order::create([
            'customer_id' => $customer->id,
            'mitra_id' => $mitra->id,
            'service_type' => 'angkut',
            'details' => 'Pindahin kardus buku 3 buah ke kos baru',
            'pickup_location' => 'Kos Lama, Jl. Mawar No. 7',
            'dropoff_location' => 'Kos Baru, Jl. Melati No. 15',
            'bid_price' => 25000,
            'admin_fee' => 1000,
            'status' => 'in_progress',
        ]);

        Order::create([
            'customer_id' => $customer->id,
            'mitra_id' => $mitra->id,
            'service_type' => 'makanan',
            'details' => 'Ayam geprek level 5 + nasi dari Geprek Mantul',
            'pickup_location' => 'Geprek Mantul, Food Court Lt. 1',
            'dropoff_location' => 'Perpustakaan Kampus, Meja Pojok',
            'bid_price' => 12000,
            'admin_fee' => 1000,
            'status' => 'completed',
        ]);

        Order::create([
            'customer_id' => $customer->id,
            'mitra_id' => $mitra->id,
            'service_type' => 'print',
            'details' => 'Print skripsi 80 halaman, jilid biru',
            'pickup_location' => 'Fotokopi Murah, Jl. Pendidikan No. 9',
            'dropoff_location' => 'Gedung Rektorat, Ruang Sidang 3',
            'bid_price' => 30000,
            'admin_fee' => 1000,
            'status' => 'paid_to_mitra',
        ]);
    }
}
