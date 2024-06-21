<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $text, $url, $icon, $color, $size, $classes, $target, $dataAttributes, $style;

    /**
     * Create a new component instance.
     */
    public function __construct(string $text, string $url = 'javascript:void(0)', string $icon = null, string $color = 'primary', string $size = 'sm', string $style = 'outline', string $classes = null, string $target = null, array|null $dataAttributes = null)
    {
        $this->text = $text;
        $this->url = $url;
        $this->icon = $icon;
        $this->color = $color;
        $this->size = $size;
        $this->style = $style;
        $this->classes = $classes;
        $this->target = $target;
        $this->dataAttributes = $dataAttributes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $text = $this->text;
        $url = $this->url;
        $icon = $this->icon;
        $color = $this->color;
        $size = $this->size;
        $style = $this->style;
        $classes = $this->classes;
        $target = $this->target;
        $dataAttributes = $this->dataAttributes;

        return view('components.button', compact([
            'text',
            'url',
            'icon',
            'color',
            'size',
            'style',
            'classes',
            'target',
            'dataAttributes',
        ]));
    }
}
