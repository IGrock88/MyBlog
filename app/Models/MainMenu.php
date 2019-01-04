<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class MainMenu extends Model
{
    use ModelTree, AdminBuilder;
    protected $table = 'main_menu';

    protected $fillable = ['name', 'route', 'parentId', 'status'];

    const PUBLIC = '1';
    const NOT_PUBLIC = '0';

    public static $statuses = [
        self::PUBLIC => 'Опубликован',
        self::NOT_PUBLIC => 'Не опубликован'
    ];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parentId');
        $this->setOrderColumn('order');
        $this->setTitleColumn('name');
    }

}
