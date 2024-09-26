<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class text-with-image extends Component
{
    
    public $heading;
    public $text;
    public $imageUrl;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $heading, $text, $imageUrl
    )
    {
        $this->heading = $heading;
        $this->text = $text;
        $this->imageUrl = $imageUrl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.text-with-image');
    }
}
