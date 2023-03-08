<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['date_ref', 'consumption', 'value', 'complex_id'];

    /** Relationships */
    public function complex()
    {
        return $this->belongsTo(Complex::class);
    }

    /** Accessors */
    public function getConsumptionAttribute($value)
    {
        return number_format($value, 2, ",", ".");
    }

    public function getValueAttribute($value)
    {
        return 'R$ ' . number_format($value, 2, ",", ".");
    }
}
