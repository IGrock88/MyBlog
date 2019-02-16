<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';


    public function article()
    {
        return $this->hasOne(Article::class, 'id', 'articleId');
    }




    public static function byArticle($articleId)
    {
        return self::where('articleId', '=', $articleId);
    }

    public function setChildrenAttribute($children)
    {
        $this->attributes['children'][] = $children;
    }

    public function getChildrenAttribute()
    {
        return $this->attributes['children'];
    }
}
