<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ['name', 'parentId', 'route'];

    public function article()
    {
        return $this->belongsTo(Article::class, 'categoryId');
    }
}
