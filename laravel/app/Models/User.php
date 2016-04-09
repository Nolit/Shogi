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
        return $this->hasOne('App\Models\Record');
    }
    public function status()
    {
        return $this->hasOne('App\Models\Status');
    }
    
    public function save(array $options = array()) {
        parent::save($options);
        if(!isset($this->record->user_id) && !isset($this->status->user_id)){
            $this->record->user_id = $this->id;
            $this->status->user_id = $this->id;
        }
        $this->record->save();
        $this->status->save();
    }
}
