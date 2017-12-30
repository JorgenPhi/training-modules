<?php

namespace ModuleBasedTraining;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    
    public function results() {
        return $this->hasMany('ModuleBasedTraining\QuizResult')->orderByDesc('created_at');
    }

    public function getCompleted() {
        return $this->hasMany('ModuleBasedTraining\QuizResult')->where('quiz_results.pass', '=', true);
    }
}
