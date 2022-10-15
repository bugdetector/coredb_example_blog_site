<?php

namespace App\Entity;

use CoreDB\Kernel\Model;
use CoreDB\Kernel\Database\DataType\ShortText;

/**
 * Object relation with table tag
 * @author mbakiyucel
 */

class Tag extends Model
{
    /**
    * @var ShortText $name
    * Etiket adı.
    */
    public ShortText $name;

    /**
     * @inheritdoc
     */
    public static function getTableName(): string
    {
        return "tag";
    }
}
