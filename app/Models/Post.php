<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Models\Category;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'slug',
        'image_path',
        'image_alt',
        'status',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'category_id'
    ];

    public function getShortDescriptionAttribute()
    {
        return Str::words($this->body, 5, '...');
    }

    //create relation: a single post belongs to a user 
    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
