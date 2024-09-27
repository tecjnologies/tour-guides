<?php

namespace App\View\Components\tour-guide;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class top-destination-list extends Component
{
    

    public $data;
   

    /**
     * Create a new component instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tour-guide.top-destination-list');
    }
}
