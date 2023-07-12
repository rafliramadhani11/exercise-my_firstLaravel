<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = ['judul', 'penulis', 'excerpt', 'body']; // BEBERAPA OBJEK YG BISA DI MASS ASIGNMENT

    protected $guarded = ['id']; // MENJAGA OBJEK AGAR TIDAK BISA DI INPUT 
    // FUNGSI FILLABLE KEBALIKAN DARI GUARDED !!
    // DENGAN DIBERI $fillable atau $guarded KITA DAPAT MELAKUKAN MASS ASIGNMENT PADA TERMINAL TINKER 
    // TINNGAL MELAKUKAN Post::create() SAJA LALU MASUKAN OBJEK DAN NILAI NYA 
    // TIDAK PERLU MELAKUKAN $post->save()

    protected $with = ['user', 'category']; // eager load

    public function scopeFilter($query, array $filters) //local scope
    {
        // when method collections
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', 'like', '%' . $category . '%');
            });
        });

        $query->when($filters['user'] ?? false, function ($query, $user) {
            return $query->whereHas('user', function ($query) use ($user) {
                $query->where('name', 'like', '%' . $user . '%');
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
