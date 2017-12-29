<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quiz_results';

    public function module() {
    	return $this->belongsTo('App\Module');
    }
    public function user() {
    	return $this->belongsTo('App\User');
    }
}
