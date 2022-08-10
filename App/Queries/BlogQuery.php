<?php

namespace App\Queries;

use Src\Entity\ViewableQueries;

class BlogQuery extends ViewableQueries
{
    public static function getInstance()
    {
        return parent::getByKey("blog_records");
    }
}
