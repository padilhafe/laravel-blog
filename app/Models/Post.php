<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category', 'author'];
    //protected $fillable = ['title', 'excerpt', 'body'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query->where(fn($query) => 
            $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')
            )
        );
        
        $query->when($filters['category'] ?? false, fn ($query, $category) =>
        $query
            ->whereHas('category', fn($query) => 
                $query->where('slug', $category))
        );
        
        $query->when($filters['author'] ?? false, fn ($query, $author) =>
        $query
            ->whereHas('author', fn($query) => 
                $query->where('username', $author))
        );
    }

    public function category()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id');
    }
}