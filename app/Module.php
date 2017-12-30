<?php

namespace ModuleBasedTraining;

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
    	return $this->hasMany('ModuleBasedTraining\Question');
    }
    public function results() {
    	return $this->hasMany('ModuleBasedTraining\QuizResult');
    }
}
