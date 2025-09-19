<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cuti;
use Carbon\Carbon;

class CutiSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 12) as $i) {
            $mulai   = Carbon::now()->subMonths(rand(0, 11))->startOfMonth()->addDays(rand(0,20));
            $selesai = (clone $mulai)->addDays(rand(1,5));

            Cuti::create([
                'pegawai_id'      => rand(1, 5), // sesuaikan sama pegawai
                'tanggal_mulai'   => $mulai,
                'tanggal_selesai' => $selesai,
                'status'          => ['Pending','Disetujui','Ditolak'][array_rand(['Pending','Disetujui','Ditolak'])],
            ]);
        }
    }
}
