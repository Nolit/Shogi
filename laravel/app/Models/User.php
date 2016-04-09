<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    private $record;
    private $status;
    
    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);
        
        $this->record = new Record();
        $this->status = new Status();
    }
    
    public function record()
    {
        return $this->hasOne(Record::class);
    }
    public function status()
    {
        return $this->hasOne(Status::class);
    }
    public function avatars()
    {
        return $this->belongsToMany(Avatar::class)->withTimestamps();
    }
    public function titles()
    {
        return $this->belongsToMany(Title::class)->withTimestamps();
    }
    
    public function save(array $options = array()) {
        parent::save($options);
        
        //リレーションの処理をこの分岐に書きます
        //主キーがsaveメソッド時に割り当てられるためコンストラクタには書けない
        if(!isset($this->record->user_id) && !isset($this->status->user_id)){
            $this->record->user_id = $this->id;
            $this->status->user_id = $this->id;
            for($i=0;$i<3;$i++){
                $this->avatars()->save(Avatar::find($i+1));
            }
            $this->titles()->save(Title::find(1));
        }
        
        $this->record->save();
        $this->status->save();
    }
}
