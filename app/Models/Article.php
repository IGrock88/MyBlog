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

    const PUBLIC = '1';
    const NOT_PUBLIC = '0';

    public static $statuses = [
        self::PUBLIC => 'Опубликована',
        self::NOT_PUBLIC => 'Не опубликована'
    ];

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

    public function prevArticle()
    {
        return $this->hasOne(Article::class, 'id', 'prevArticleId');
    }

    public function nextArticle()
    {
        return $this->hasOne(Article::class, 'id', 'nextArticleId');
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
