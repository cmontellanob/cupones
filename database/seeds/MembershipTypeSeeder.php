<?php

use Illuminate\Database\Seeder;
use App\MembershipType;

class MembershipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(MembershipType::class, 10)->create();
    }
}
