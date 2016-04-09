<?php

use Illuminate\Database\Seeder;
use App\Models\Kifu;
class KifuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DatabaseSeeder::truncateTable('kifus');
        
        for($i=1;$i<5;$i++){
            $kifu = new Kifu();
            $kifu->sente_id = $i;
            $kifu->gote_id = $i+1;
            $kifu->sente_win = true;
            $kifu->save();
        }
    }
}
