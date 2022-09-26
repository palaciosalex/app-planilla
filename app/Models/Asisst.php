<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Asisst extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_hora','tipo','employee_id'];

    public static function isValid($date, $format = 'Y-m-d'){
        $dt = DateTime::createFromFormat($format, $date);
        return $dt && $dt->format($format) == $date;
    }
}
