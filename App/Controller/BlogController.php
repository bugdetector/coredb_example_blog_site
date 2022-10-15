<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Queries\BlogQuery;
use App\Theme\CustomTheme;
use CoreDB\Kernel\BaseController;
use CoreDB\Kernel\Router;
use Src\Controller\NotFoundController;
use Src\Entity\Translation;
use Src\Form\SearchForm;
use Src\Theme\ThemeInteface;
use Src\Views\TextElement;

class BlogController extends BaseController
{
    public $blogForm;
    public ?Blog $blog = null;
    public function getTheme(): ThemeInteface
    {
        return new CustomTheme();
    }

    public function checkAccess(): bool
    {
        return true;
    }

    public function preprocessPage()
    {
        if (@$this->arguments[0]) {
            $this->blog = Blog::get($this->arguments[0]);
            if (!$this->blog) {
                Router::getInstance()->route(NotFoundController::getUrl());
            }
            $this->setTitle($this->blog->title);
        } else {
            $this->setTitle(Translation::getTranslation("blog"));
            $this->blogForm = SearchForm::createByObject(BlogQuery::getInstance());
            $this->blogForm->addClass("p-3");
        }
    }

    public function echoContent()
    {
        if ($this->blog) {
            return TextElement::create($this->blog->body)
                ->setIsRaw(true)
                ->addClass("p-3");
        } else {
            return $this->blogForm;
        }
    }
}
