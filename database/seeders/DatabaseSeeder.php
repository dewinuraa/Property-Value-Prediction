<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        DB::table('bentuks')->insert([
            'name' => 'Beraturan',
            'no' => 0
        ]);
        DB::table('bentuks')->insert([
            'name' => 'Lainnya',
            'no' => 1
        ]);
        DB::table('bentuks')->insert([
            'name' => 'Persegiempat',
            'no' => 2
        ]);
        DB::table('bentuks')->insert([
            'name' => 'Persegipanjang',
            'no' => 3
        ]);
        DB::table('bentuks')->insert([
            'name' => 'Tidak Beraturan',
            'no' => 4
        ]);

        DB::table('peruntukans')->insert([
            'name' => 'Campuran',
            'no' => 0
        ]);
        DB::table('peruntukans')->insert([
            'name' => 'Komersil',
            'no' => 1
        ]);
        DB::table('peruntukans')->insert([
            'name' => 'Rumah Tinggal',
            'no' => 2
        ]);
        DB::table('peruntukans')->insert([
            'name' => 'Pemukiman',
            'no' => 3
        ]);
        DB::table('peruntukans')->insert([
            'name' => 'Perumahan',
            'no' => 4
        ]);
        DB::table('peruntukans')->insert([
            'name' => 'Zona Hutan Lindung',
            'no' => 5
        ]);
        DB::table('peruntukans')->insert([
            'name' => 'Zona Industri',
            'no' => 6
        ]);
        DB::table('peruntukans')->insert([
            'name' => 'Zona Lindung Lainnya',
            'no' => 7
        ]);
        DB::table('peruntukans')->insert([
            'name' => 'Zona PeRumah Tinggalan',
            'no' => 8
        ]);
        DB::table('peruntukans')->insert([
            'name' => 'Zona Perdagangan dan Jasa',
            'no' => 9
        ]);
        DB::table('peruntukans')->insert([
            'name' => 'Zona Perlindungan Setempat',
            'no' => 10
        ]);
        DB::table('peruntukans')->insert([
            'name' => 'Zona Perumahan',
            'no' => 11
        ]);
        DB::table('peruntukans')->insert([
            'name' => 'Zona Peruntukan Lainnya',
            'no' => 12
        ]);
        DB::table('peruntukans')->insert([
            'name' => 'Zona Ruang Terbuka Hijau',
            'no' => 13
        ]);
        DB::table('peruntukans')->insert([
            'name' => 'Zona Sarana Pelayanan Umum',
            'no' => 14
        ]);
        DB::table('letaks')->insert([
            'name' => 'Interior',
            'no' => 0
        ]);
        DB::table('letaks')->insert([
            'name' => 'Kuldesak',
            'no' => 1
        ]);
        DB::table('letaks')->insert([
            'name' => 'Sudut (Corner)',
            'no' => 2
        ]);
        DB::table('letaks')->insert([
            'name' => 'Tusuk Sate',
            'no' => 3
        ]);



        // \App\Models\users::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('admin'),
        // ]);
    }
}
