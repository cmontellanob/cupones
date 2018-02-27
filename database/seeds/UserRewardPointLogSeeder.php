<?php

use Illuminate\Database\Seeder;
use App\UserRewardPointLog;

class UserRewardPointLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UserRewardPointLog::class, 35)->create(); 
    }
}
