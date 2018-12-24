<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';

    protected $fillable = ['title', 'preview', 'text', 'titleImage', 'author', 'tags', 'route', 'categoryId', 'updated_at', 'deleted_at', 'created_at'];
}
