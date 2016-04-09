<?php

use Illuminate\Database\Seeder;
use App\Models\Title;
class TitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DatabaseSeeder::truncateTable('titles');
        
        $titles[] = ['name'=>"ルーキー",'summary'=>"新たなプレイヤーに送られる証",'price'=>0,'qualification'=>0];
        $titles[] = ['name'=>"熟練棋士",'summary'=>"勝利数が50回を超える",'price'=>300,'qualification'=>50];
        $titles[] = ['name'=>"プロ棋士",'summary'=>"勝利数が100回を超える",'price'=>1000,'qualification'=>100];
        $titles[] = ['name'=>"一騎当千",'summary'=>"10連勝する",'price'=>5000,'qualification'=>10];
        $titles[] = ['name'=>"国士無双",'summary'=>"20連勝する",'price'=>7500,'qualification'=>20];
        $titles[] = ['name'=>"天下無双",'summary'=>"30連勝する",'price'=>10000,'qualification'=>30];
        foreach($titles as $_title){
            $title = new Title();
            $title->name = $_title['name'];
            $title->summary = $_title['summary'];
            $title->price = $_title['price'];
            $title->qualification = $_title['qualification'];
            $title->save();
        }
    }
}
