<?php

namespace App\View\Components\Tourguide;

use Closure;
use Doctrine\DBAL\Driver\Mysqli\Initializer\Options;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RecentReviews extends Component
{
    
    public $data;
    public $options;
   

    /**
     * Create a new component instance.
     */
    public function __construct($data ,  $options = [])
    {
        $this->data = $data;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tour-guide.recent-reviews',[
            'data' => $this->data,
            'options' => $this->options
        ]);
    }
}
