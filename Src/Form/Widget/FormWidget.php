<?php

namespace Src\Form\Widget;

use Src\Theme\CoreRenderer;
use Src\Theme\View;

abstract class FormWidget extends View
{
    public $name;
    public $value;
    public $label;
    public $description;

    public function __construct(string $name)
    {
        $this->setName($name);
        $this->addClass("form-control");
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function setValue(string $value)
    {
        $this->value = $value;
        return $this;
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function setDescription($description) : self
    {
        $this->description = $description;
        return $this;
    }

    public function render()
    {
        CoreRenderer::getInstance([])->renderWidget($this);
    }
}
