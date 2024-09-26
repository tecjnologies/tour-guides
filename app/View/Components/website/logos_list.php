<?php

namespace App\View\Components\website;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class logos_list extends Component {


    public function __construct(){  }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.website.logos-list');
    }
}
