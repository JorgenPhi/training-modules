<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'modules';

    public function questions() {
    	return $this->hasMany('App\Question');
    }
    public function results() {
    	return $this->hasMany('App\QuizResult');
    }
}
