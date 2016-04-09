<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //依存関係：Avatar/Title <= User <= Kifu
        Model::unguard();
        $this->call(AvatarTableSeeder::class);
        $this->call(TitleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(KifuTableSeeder::class);
    }
    
    public static function truncateTable($table)
    {
        DB::statement('SET foreign_key_checks = 0');
        DB::table($table)->truncate();
        DB::statement('SET foreign_key_checks = 1');
    }
}
