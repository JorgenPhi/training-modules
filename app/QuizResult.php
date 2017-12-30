<?php

namespace ModuleBasedTraining;

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
    	return $this->belongsTo('ModuleBasedTraining\Module');
    }
    public function user() {
    	return $this->belongsTo('ModuleBasedTraining\User');
    }
}
