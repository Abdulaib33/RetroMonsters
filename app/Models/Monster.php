<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    protected $fillable = [
        'name',
        'type',
        'pv',
        'attack',
        'defense',
        'description',
        'image_url', // bonus (optionnel)
    ];

    public function type()
    {
        return $this->belongsTo(MonsterType::class, 'type_id');
    }

    public function rarety()
    {
        return $this->belongsTo(Rarety::class, 'rarety_id');
    }
}
