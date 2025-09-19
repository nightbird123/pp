<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absensi;
use Carbon\Carbon;

class AbsensiSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 20) as $i) {
            Absensi::create([
                'pegawai_id' => rand(1, 5), // sesuaikan sama pegawai yg udah ada
                'tanggal'    => Carbon::now()->subDays(rand(0, 6)),
                'status'     => ['Hadir','Izin','Sakit'][array_rand(['Hadir','Izin','Sakit'])],
            ]);
        }
    }
}
