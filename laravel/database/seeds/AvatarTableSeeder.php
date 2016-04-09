<?php

use Illuminate\Database\Seeder;
use App\Models\Avatar;
class AvatarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DatabaseSeeder::truncateTable('avatars');
        
        for($i=1;$i<5;$i++){
            $avatar = new Avatar();
            $avatar->name = "man$i";
            $avatar->price = 1000*$i;
            $avatar->save();
        }
        
        for($i=1;$i<5;$i++){
            $avatar = new Avatar();
            $avatar->name = "woman$i";
            $avatar->price = 100*$i;
            $avatar->save();
        }
    }
}
