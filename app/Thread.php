<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'title',
    ];
    public function texts()
    {
          return $this->hasMany('App\Text','thread_id','id');
    }
}
