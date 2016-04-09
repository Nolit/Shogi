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
        DatabaseSeeder::truncateTable('friends');
        DatabaseSeeder::truncateTable('friends_request');
        
        for($i=1;$i<11;$i++){
            $user = new User();
            $user->name = 'name' . $i;
            $user->email = "mail" . $i;
            $user->password = "pass" . $i;
            $user->save();
        }
        
        for($i=1;$i<4;$i++){
            $user = User::find($i);
            $user->requests()->save(User::find($i+1));
        }
        $user = User::find(2);
        $user->accept(1);

    }
}
