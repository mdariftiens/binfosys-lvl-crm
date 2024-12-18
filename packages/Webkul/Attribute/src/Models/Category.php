<?php

namespace Webkul\Attribute\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model implements \Webkul\Attribute\Contracts\Category
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
    ];

    /**
     * Get the options.
     */
    public function options()
    {
        return $this->hasMany(Category::modelClass());
    }
}
