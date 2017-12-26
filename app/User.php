<?php

namespace App;

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
    
    public function results() {
        return $this->hasMany('App\QuizResult')->orderByDesc('created_at');
    }

    public function getCompleted() {
        return $this->hasMany('App\QuizResult')->where('quiz_results.pass', '=', true);
    }
}
