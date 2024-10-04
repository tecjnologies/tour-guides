<?php

namespace App\View\Components\TourGuide;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use PhpParser\Node\Expr\AssignOp\Concat;

class TourGuideGrid extends Component
{


    public $tourGuides;
    /**
     * Create a new component instance.
     */
    
     public function __construct($tourGuides)
    {
        $this->tourGuides = $tourGuides;
    }
    
    /**
     * Get the view / contents that represent the component.
     */

    public function render(): View|Closure|string
    {
        return view('components.tour-guide.tour-guide-grid', [
            'tourGuides' => $this->tourGuides
        ]);
    }
}
