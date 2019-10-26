<?php

use App\Weathers;
use Illuminate\Database\Seeder;

class WeathersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Weathers::truncate();
        factory(Weathers::class, 24)->create();
    }
}
