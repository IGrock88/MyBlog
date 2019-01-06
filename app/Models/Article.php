<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Facades\Admin;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Sluggable;

    protected $table = 'article';

    public static $routePrefix = 'article/';

    protected $fillable = ['title', 'preview', 'text', 'titleImage', 'authorId', 'tags', 'route', 'categoryId', 'author', 'slug'];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'categoryId');
    }

    public function author()
    {
        return $this->hasOne(Administrator::class, 'id', 'authorId');
    }

    public static function byCategory($categoryId)
    {
        return self::where('categoryId', '=', $categoryId);
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($article){
            $article->authorId = Admin::user()->id;
        });
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
