<?php

namespace App\View\Components\Portal;

use Illuminate\View\Component;

class PageTitle extends Component
{
    public $icon, $title, $content;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($icon = null, $title, $content = null)
    {
        $this->icon = $icon;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.portal.page-title');
    }
}
