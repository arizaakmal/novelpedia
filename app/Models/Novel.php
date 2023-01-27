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
        'genre'
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

    public function genre()
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





    // public function getCoverAttribute($value)
    // {
    //     return asset('storage/' . $value);
    // }

    // public function getThumbnailAttribute($value)
    // {
    //     return asset('storage/' . $value);
    // }

    // public function getUpdatedAtAttribute($value)
    // {
    //     return date('d F Y', strtotime($value));
    // }

    // public function getCreatedAtAttribute($value)
    // {
    //     return date('d F Y', strtotime($value));
    // }

    // public function getSynopsisAttribute($value)
    // {
    //     return nl2br($value);
    // }

    // public function getChapterCountAttribute()
    // {
    //     return $this->chapters()->count();
    // }

    // public function getChapterListAttribute()
    // {
    //     return $this->chapters()->orderBy('chapter_number', 'desc')->get();
    // }

    // public function getChapterListPaginatedAttribute()
    // {
    //     return $this->chapters()->orderBy('chapter_number', 'desc')->paginate(10);
    // }

    // public function getChapterListPaginatedWithQueryAttribute($query)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', 'desc')->paginate(10);
    // }

    // public function getChapterListPaginatedWithQueryAndSortAttribute($query, $sort)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', $sort)->paginate(10);
    // }

    // public function getChapterListPaginatedWithSortAttribute($sort)
    // {
    //     return $this->chapters()->orderBy('chapter_number', $sort)->paginate(10);
    // }

    // public function getChapterListPaginatedWithSortAndPageAttribute($sort, $page)
    // {
    //     return $this->chapters()->orderBy('chapter_number', $sort)->paginate(10, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithQueryAndSortAndPageAttribute($query, $sort, $page)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', $sort)->paginate(10, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithQueryAndPageAttribute($query, $page)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', 'desc')->paginate(10, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithPageAttribute($page)
    // {
    //     return $this->chapters()->orderBy('chapter_number', 'desc')->paginate(10, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithSortAndPageAndQueryAttribute($sort, $page, $query)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', $sort)->paginate(10, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithPageAndQueryAttribute($page, $query)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', 'desc')->paginate(10, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithPageAndSortAttribute($page, $sort)
    // {
    //     return $this->chapters()->orderBy('chapter_number', $sort)->paginate(10, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithPageAndSortAndQueryAttribute($page, $sort, $query)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', $sort)->paginate(10, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithPageAndQueryAndSortAttribute($page, $query, $sort)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', $sort)->paginate(10, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithSortAndQueryAndPageAttribute($sort, $query, $page)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', $sort)->paginate(10, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithQueryAndPageAndSortAttribute($query, $page, $sort)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', $sort)->paginate(10, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithQueryAndSortAndPageAndLimitAttribute($query, $sort, $page, $limit)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', $sort)->paginate($limit, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithQueryAndSortAndLimitAttribute($query, $sort, $limit)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', $sort)->paginate($limit);
    // }

    // public function getChapterListPaginatedWithQueryAndPageAndLimitAttribute($query, $page, $limit)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', 'desc')->paginate($limit, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithQueryAndLimitAttribute($query, $limit)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', 'desc')->paginate($limit);
    // }

    // public function getChapterListPaginatedWithSortAndPageAndLimitAttribute($sort, $page, $limit)
    // {
    //     return $this->chapters()->orderBy('chapter_number', $sort)->paginate($limit, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithSortAndLimitAttribute($sort, $limit)
    // {
    //     return $this->chapters()->orderBy('chapter_number', $sort)->paginate($limit);
    // }

    // public function getChapterListPaginatedWithPageAndLimitAttribute($page, $limit)
    // {
    //     return $this->chapters()->orderBy('chapter_number', 'desc')->paginate($limit, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithLimitAttribute($limit)
    // {
    //     return $this->chapters()->orderBy('chapter_number', 'desc')->paginate($limit);
    // }

    // public function getChapterListPaginatedWithSortAndPageAndQueryAndLimitAttribute($sort, $page, $query, $limit)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', $sort)->paginate($limit, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithPageAndQueryAndLimitAttribute($page, $query, $limit)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', 'desc')->paginate($limit, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithPageAndQueryAndSortAndLimitAttribute($page, $query, $sort, $limit)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', $sort)->paginate($limit, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithPageAndSortAndLimitAttribute($page, $sort, $limit)
    // {
    //     return $this->chapters()->orderBy('chapter_number', $sort)->paginate($limit, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithPageAndSortAndQueryAndLimitAttribute($page, $sort, $query, $limit)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', $sort)->paginate($limit, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithSortAndQueryAndPageAndLimitAttribute($sort, $query, $page, $limit)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', $sort)->paginate($limit, ['*'], 'page', $page);
    // }

    // public function getChapterListPaginatedWithQueryAndPageAndSortAndLimitAttribute($query, $page, $sort, $limit)
    // {
    //     return $this->chapters()->where('title', 'like', '%' . $query . '%')->orderBy('chapter_number', $sort)->paginate($limit, ['*'], 'page', $page);
    // }
}
