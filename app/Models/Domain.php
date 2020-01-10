<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'domains';
}
