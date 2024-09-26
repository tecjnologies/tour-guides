<?php

namespace App\View\Components\website;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Slider extends Component
{
    public $slides;
    public $options;

    /**
     * Create a new component instance.
     *
     * @return void
    */
    public function __construct($slides, $options = [])
    {
        $this->slides = $slides;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.website.slider');
    }
}
