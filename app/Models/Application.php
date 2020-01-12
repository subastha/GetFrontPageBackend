<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pivot', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The users that belong to the application
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_x_application', 'application_id', 'user_id')->withTimestamps();
    }
}
