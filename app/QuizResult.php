<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    //
    public function module() {
    	return $this->belongsTo('App\Module');
    }
    public function user() {
    	return $this->belongsTo('App\User');
    }
}
