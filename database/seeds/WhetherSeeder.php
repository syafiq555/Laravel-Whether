<?php

use App\Whether;
use Illuminate\Database\Seeder;

class WhetherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Whether::truncate();
        factory(Whether::class, 24)->create();
    }
}
