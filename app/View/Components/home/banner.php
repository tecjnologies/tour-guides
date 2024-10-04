<?php

namespace App\View\Components\home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class banner extends Component
{

    public $banner;
    /**
     * Create a new component instance.
     */
    public function __construct($banner)
    {
        $this->banner = $banner;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..home.banner');
    }
}
