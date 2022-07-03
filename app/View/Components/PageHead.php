<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHead extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $url;
    public $type;
    public function __construct($title,$url,$type)
    {
        $this->title = $title;
        $this->url = $url;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page-head');
    }
}
