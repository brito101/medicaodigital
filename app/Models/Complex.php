<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complex extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'document_company',
        'email',
        'telephone',
        'cell',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        'status'
    ];

    /** Relationships */
    public function complex()
    {
        return $this->hasMany(Block::class);
    }
}
