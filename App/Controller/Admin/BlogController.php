<?php

namespace App\Controller\Admin;

use App\Controller\AdminController;
use App\Entity\Blog;
use CoreDB\Kernel\Model;
use Src\Entity\Translation;
use Src\Traits\Controller\ListFormControllerTrait;

class BlogController extends AdminController
{
    use ListFormControllerTrait;

    /**
     * Arama yapılacak model sınıfı
     */
    protected function getModelClass(): string
    {
        return Blog::class;
    }
    /**
     * Ekleme ekranında sayfa başlığı
     */
    protected function getAddTitle(): string
    {
        return Translation::getTranslation("add_new_entity", [
            Translation::getTranslation("blog")
        ]);
    }
    /**
     * Güncelleme ekranında sayfa başlığı
     * Düzenlenen nesnenin özellikleri kullanılabili
     */
    protected function getUpdateTitle(Model $model): string
    {
        return Translation::getTranslation("edit") . " | " . $model->title;
    }
}
