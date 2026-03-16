<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rarety extends Model
{
    protected $fillable = ['name'];

    public function monsters()
    {
        return $this->hasMany(Monster::class, 'rarety_id');
    }
}
