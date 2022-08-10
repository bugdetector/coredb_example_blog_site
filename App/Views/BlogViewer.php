<?php

namespace App\Views;

use Src\Theme\ResultsViewer;

class BlogViewer extends ResultsViewer
{
    public function getTemplateFile(): string
    {
        return "blog-viewer.twig";
    }
}
