<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $fillable = ['name'];

    public function novels()
    {
        return $this->belongsToMany(Novel::class);
    }
}
