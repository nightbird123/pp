<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absensi;
use App\Models\Pegawai;
use Carbon\Carbon;

class AbsensiSeeder extends Seeder
{
    public function run(): void
    {
        $status = ['Hadir', 'Izin', 'Sakit'];
        $pegawaiIds = Pegawai::pluck('id')->toArray();

        foreach (range(1, 20) as $i) {
            Absensi::create([
                'pegawai_id' => $pegawaiIds[array_rand($pegawaiIds)], 
                'tanggal'    => Carbon::now()->subDays(rand(0, 6))->toDateString(),
                'status'     => $status[array_rand($status)],
            ]);
        }
    }
}
