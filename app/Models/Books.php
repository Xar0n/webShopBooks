<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $description
 * @property string     $title
 * @property int     $available
 * @property int     $price
 */
class Books extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'books';

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
        'publisher_id','author_id', 'category_id', 'description', 'series_id', 'title', 'price', 'available'
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
        'description' => 'string', 'title' => 'string'
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
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function series()
    {
        return $this->belongsTo(Series::class, 'series_id');
    }

    public function author()
    {
        return $this->belongsTo(Authors::class, 'author_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publishers::class, 'publisher_id');
    }

    public function images()
    {
        return $this->hasMany(Images::class, 'book_id');
    }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'book_id');
    }

    public function popularity()
    {
        return $this->hasOne(Popularity::class, 'book_id');
    }
}
