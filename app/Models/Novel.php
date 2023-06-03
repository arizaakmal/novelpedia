<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $with = [
        'author',
        'genres'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['cari'] ?? false,
            fn ($query, $cari) =>
            $query->where(
                fn ($query) =>
                $query->where('title', 'like', '%' . $cari . '%')
                    ->orWhere('description', 'like', '%' . $cari . '%')
            )
        );
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
