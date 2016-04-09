<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DatabaseSeeder::truncateTable('users');
        DatabaseSeeder::truncateTable('records');
        DatabaseSeeder::truncateTable('statuses');
        DatabaseSeeder::truncateTable('title_user');
        DatabaseSeeder::truncateTable('avatar_user');
        
        for($i=1;$i<11;$i++){
            $user = new User();
            $user->name = 'name' . $i;
            $user->email = "mail" . $i;
            $user->password = "pass" . $i;
            $user->save();
        }
    }
}
