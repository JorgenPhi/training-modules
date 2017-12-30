<?php

namespace ModuleBasedTraining;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';

    public function module() {
    	return $this->belongsTo('ModuleBasedTraining\Module');
    }

}
