<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Block extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'complex_id'];

    /** Relationships */
    public function complex()
    {
        return $this->belongsTo(Complex::class);
    }

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }
}
