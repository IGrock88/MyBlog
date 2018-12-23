<?php

namespace App\Models;


use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 *
 * @property $id
 * @property $name
 * @property $parentId
 * @property $created_at
 * @property $updated_at
 *
 * @mixin Builder

 */

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ['name'];


}
