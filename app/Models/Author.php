<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function novels()
    {
        return $this->hasMany(Novel::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
