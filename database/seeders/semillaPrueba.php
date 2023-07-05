<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Like;
use App\Models\Image;
use App\Models\coment;

class semillaPrueba extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // User::factory()->count(10)->create();
        Like::factory()->count(10)->create();
       // Image::factory()->count(10)->create();
       // Coment::factory()->count(10)->create();
    }
}
