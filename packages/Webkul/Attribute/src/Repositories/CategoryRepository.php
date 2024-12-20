<?php

namespace Webkul\Attribute\Repositories;

use Webkul\Attribute\Models\Category;
use Webkul\Core\Eloquent\Repository;

class CategoryRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Category::class;
    }
}
