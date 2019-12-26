<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pivot', 'created_at', 'updated_at'
    ];

    /**
     * The users that belong to the application
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_x_application', 'application_id', 'user_id')->withTimestamps();
    }
}
