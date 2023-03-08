<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills_view';

    protected $appends = [
        'date_format',
        'consumption_format',
        'value_format',
    ];

    /** Accessors */
    public function getDateFormatAttribute($value)
    {
        return date('d/m/Y', strtotime($this->date_ref));
    }

    public function getConsumptionFormatAttribute($value)
    {
        return number_format($this->consumption, 2, ",", ".") . ' m³';
    }

    public function getValueFormatAttribute($value)
    {
        return 'R$ ' . number_format($this->value, 2, ",", ".");
    }
}
