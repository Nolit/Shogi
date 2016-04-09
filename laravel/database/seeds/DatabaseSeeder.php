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
        Model::unguard();
        $this->call(UserTableSeeder::class);
    }
    
    public static function truncateTable($table)
    {
        DB::statement('SET foreign_key_checks = 0');
        DB::table($table)->truncate();
        DB::statement('SET foreign_key_checks = 1');
    }
}
