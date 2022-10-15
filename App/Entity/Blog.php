<?php

namespace App\Entity;

use App\Controller\Admin\BlogController;
use CoreDB\Kernel\Model;
use CoreDB\Kernel\Database\DataType\ShortText;
use CoreDB\Kernel\Database\DataType\LongText;
use CoreDB\Kernel\Database\DataType\Checkbox;
use CoreDB\Kernel\Database\SelectQueryPreparerAbstract;
use Src\Entity\Translation;
use Src\Views\Link;
use Src\Views\TextElement;

/**
 * Object relation with table blog
 * @author mbakiyucel
 */

class Blog extends Model
{
    /**
     * @var ShortText $title
     * Blog başlığı
     */
    public ShortText $title;
    /**
     * @var LongText $body
     * Blog içeriğinin HTML'i
     */
    public LongText $body;
    /**
     * @var Checkbox $published
     * Blog yayında mı?
     */
    public Checkbox $published;

    /**
     * @inheritdoc
     */
    public static function getTableName(): string
    {
        return "blog";
    }

    public function getResultHeaders(bool $translateLabel = true): array
    {
        $headers = parent::getResultHeaders($translateLabel);
        unset($headers["body"]);
        return $headers;
    }

    public function getResultQuery(): SelectQueryPreparerAbstract
    {
        return \CoreDB::database()->select(self::getTableName(), "b")
            ->select("b", [
                "ID as edit_actions", // edit_actions düzenleme ve silme butonları için gereklidir.
                "ID",
                "title",
                "published",
                "created_at",
                "last_updated"
            ]);
    }

    public function actions(): array
    {
        return [
            Link::create(
                BlogController::getUrl() . "add",
                TextElement::create(
                    "<span class='fa fa-plus'></span> " .
                    Translation::getTranslation("add_new_entity", [
                        Translation::getTranslation("blog")
                    ])
                )->setIsRaw(true)
            )->addClass("btn btn-sm btn-primary")
        ];
    }

    public function editUrl($value = null)
    {
        return BlogController::getUrl() . ($value ?: $this->ID);
    }
}
