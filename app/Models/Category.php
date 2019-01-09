<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Doctrine\DBAL\Query\QueryBuilder;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use Sluggable, ModelTree, AdminBuilder;

    public static $routePrefix = 'category/';

    protected $table = 'category';

    protected $fillable = ['name', 'route'];


    const PUBLIC = '1';
    const NOT_PUBLIC = '0';

    public static $statuses = [
        self::PUBLIC => 'Опубликована',
        self::NOT_PUBLIC => 'Не опубликована'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parentId');
        $this->setOrderColumn('order');
        $this->setTitleColumn('name');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
        return $this->belongsTo(Article::class, 'categoryId');
    }

    public static function bySlug($slug)
    {
        return self::where('slug', '=', $slug);
    }

    /**
     * @return QueryBuilder
     */
    public static function isActive()
    {

        return self::where('status', '=', self::PUBLIC);



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
                'source' => 'name'
            ]
        ];
    }

}
