<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;
    
    public function record()
    {
        return $this->hasOne('App\Models\Record');
    }
    public function status()
    {
        return $this->hasOne('App\Models\Status');
    }
}
