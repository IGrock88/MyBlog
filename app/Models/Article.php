<?php

namespace App\Models;

use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Facades\Admin;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';

    protected $fillable = ['title', 'preview', 'text', 'titleImage', 'authorId', 'tags', 'route', 'categoryId', 'author'];

    public function category()
    {
        return $this->hasOne(Category::class, 'categoryId');
    }

    public function author()
    {
        return $this->hasOne(Administrator::class, 'id', 'authorId');
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($article){
            $article->authorId = Admin::user()->id;
        });
    }
}
