<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $address
 * @property string     $FIO
 * @property int        $phone
 * @property string     $number
 * @property int        $sum
 * @property int        $status_id
 * @property boolean    $delivery
 */
class Payments extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payments';

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
        'address', 'delivery', 'FIO', 'phone', 'sum', 'status_id', 'number'
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
        'address' => 'string', 'FIO' => 'string', 'phone' => 'int', 'sum' => 'int', 'number' => 'string'
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
    public function orders()
    {
        return $this->hasMany(Orders::class, 'payment_id');
    }

    public function status()
    {
        return $this->belongsTo(Statuses::class, 'status_id');
    }
}
