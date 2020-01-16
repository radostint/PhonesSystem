<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phones extends Model
{
    protected $fillable = ['model','year'];

    public function manufacturer()
    {
        return $this->belongsTo(\App\Manufacturers::class, 'manufacturerId');
    }
}
