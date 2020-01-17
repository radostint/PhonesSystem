<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phones extends Model
{
    protected $fillable = ['model','year','manufacturerId',];

    public function manufacturer()
    {
        return $this->belongsTo(\App\Manufacturers::class, 'manufacturerId');
    }
}
