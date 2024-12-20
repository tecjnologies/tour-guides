<?php

namespace App\View\Components\home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VipService extends Component
{
    public $data;
    public $options;
   

    /**
     * Create a new component instance.
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.vip-service', 
        [
            'data' => $this->data
        ]);

    }
}
