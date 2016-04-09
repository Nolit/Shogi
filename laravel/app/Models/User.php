<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    private $_record;
    private $_status;
    
    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);
        
        $this->_record = new Record();
        $this->_status = new Status();
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
    private function friends()
    {
        return $this->belongsToMany(User::class,'friends','accepted_id','requested_id')->withTimestamps();
    }
    public function accept($id){
        DB::table('friends_request')
                ->whereIn('requesting_id',[$this->id,$id],'or')->whereIn('requesting_id',[$this->id,$id],'or')
                ->delete();
        $this->friends()->save(User::find($id));
    }
    public function requests()
    {
        return $this->belongsToMany(User::class,'friends_request','pending_id','requesting_id')->withTimestamps();
    }
    
    public function save(array $options = array()) {
        parent::save($options);
        
        //リレーションの処理をこの分岐に書きます
        //主キーがsaveメソッド時に割り当てられるためコンストラクタには書けない
        if(!isset($this->avatars()->find("3")->id)){
            $this->_record->user_id = $this->id;
            $this->_status->user_id = $this->id;
            for($i=0;$i<3;$i++){
                $this->avatars()->save(Avatar::find($i+1));
            }
            $this->titles()->save(Title::find(1));
            $this->_record->save();
            $this->_status->save();
        }else{
            $this->record->save();
            $this->status->save();
        }
    }
}
