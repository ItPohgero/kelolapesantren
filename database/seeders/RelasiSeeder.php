<?php

namespace Database\Seeders;

use App\Models\Relasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relasi = collect([
            'MTs',
            'VII A',
            'VII B',
            'VII C',
            'VII D',
            'VIII A',
            'VIII B',
            'VIII C',
            'VIII D',
            'IX A',
            'IX B',
            'IX C',
            'IX D',
            'MA',
            'X A',
            'X B',
            'X C',
            'X D',
            'XI A',
            'XI B',
            'XI C',
            'XI D',
            'XII A',
            'XII B',
            'XII C',
            'XII D',
        ]);
        $relasi->each(function ($c) {
            Relasi::create([
                'nama'         => $c,
                'slug'         => Str::slug(date('dmy') . ' ' . Str::random(5))
            ]);
        });
    }
}
