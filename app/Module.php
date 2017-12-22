<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //

    public function questions() {
    	return $this->hasMany('App\Question');
    }
    public function results() {
    	return $this->hasMany('App\QuizResult');
    }
}
