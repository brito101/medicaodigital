<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'block_id'];

    /** Relationships */
    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function meters()
    {
        return $this->hasMany(Meter::class);
    }

    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
}
