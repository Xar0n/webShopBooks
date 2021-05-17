<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $img
 * @property string     $title
 */
class Series extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'series';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id', 'img', 'title'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'img' => 'string', 'title' => 'string'
    ];


    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...
}
