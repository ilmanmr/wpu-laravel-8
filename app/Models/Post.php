<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;


    protected $guarded = ['id'];
    protected $with = ['author', 'category'];

    public function scopeFilter($q, array $filters)
    {
        $q->when($filters['search'] ?? false, function ($q, $search) {
            return $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('excerpt', 'like', '%' . $search . '%');
        });

        $q->when($filters['category'] ?? false, function ($q, $category) {
            return $q->whereHas('category', function ($q) use ($category) {
                $q->where('slug', $category);
            });
        });

        $q->when($filters['author'] ?? false, function ($q, $author) {
            return $q->whereHas('author', function ($q) use ($author) {
                $q->where('username', $author);
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
