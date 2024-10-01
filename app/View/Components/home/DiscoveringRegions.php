<?php

namespace App\View\Components\home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DiscoveringRegions extends Component
{
    
    public $data;
    public $options;
    /**
     * Create a new component instance.
     */
    public function __construct($data=[], $options=[])
    {
        $this->data = $data;
        $this->data = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.discovering-regions', 
        [
            'data' => $this->data,
            'options' => $this->options,
        ]);
    }
}
