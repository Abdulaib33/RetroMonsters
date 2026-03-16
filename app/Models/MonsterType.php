<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonsterType extends Model
{
    protected $fillable = ['name'];

    public function monsters()
    {
        return $this->hasMany(Monster::class, 'type_id');
    }
}
