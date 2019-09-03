<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = [
        'text','name','mail','ip'
    ];
    public function Thread()
    {
        $this->belongsTo('App\Thread');
    }
}
