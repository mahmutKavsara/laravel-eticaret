<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sliderseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::create([
            'image' => 'https://fakeimg.pl/250x100/',
            'name' => 'Slider1',
            'content' => 'Eticaret sitesine hoşgeldiniz',
            'link' => 'urunler',
            'status' => '1'
        ]);
    }
}
