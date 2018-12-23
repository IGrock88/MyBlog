<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;


/**
 * Class Article
 * @package App\Models
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $preview
 * @property string $titleImage
 * @property string $author
 * @property string $tags
 * @property int $categoryId
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @mixin Builder
 */

class Article extends Model
{
    use SoftDeletes,AdminBuilder;

    protected $table = 'article';

    protected $fillable = ['title', 'preview', 'text', 'titleImage', 'tags', 'author', 'route', 'categoryId', 'created_at', 'updated_at', 'deleted_at'];

}
