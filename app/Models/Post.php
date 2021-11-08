<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    

    // protected $fillable = ['title','excerpt','body'];
    protected $guarded = ['id']; //ini yang gak boleh, sisanya boleh
    //protected $with = ['category,author'];
    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['cari']) ? $filters['cari'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['cari'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['cari'] . '%');
        // }

        $query->when($filters['cari'] ?? false, function ($query, $cari) {
            return $query->where('title', 'like', '%' . $cari . '%')
                ->orWhere('body', 'like', '%' . $cari . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class); //belongs to berarti 1 to 1
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    //  }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
        //user_id itu untuk membuat function author seolah2 user_id
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }
}
