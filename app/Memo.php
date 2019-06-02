<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $fillable = ['memo', 'memo_day', 'user_id'];
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
