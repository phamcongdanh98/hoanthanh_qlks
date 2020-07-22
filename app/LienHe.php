<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    protected $table='lienhe';
    protected $fillable = [
        'ten',
        'sdt',
        'email',
        'loinhan'
    ];
}
