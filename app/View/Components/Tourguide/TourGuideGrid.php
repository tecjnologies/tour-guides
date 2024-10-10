<?php

namespace App\View\Components\TourGuide;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use PhpParser\Node\Expr\AssignOp\Concat;

class TourGuideGrid extends Component
{


    public $tourGuides;
    public $places;
    public $languages;
    public $placeTypes;
    
    /**
     * Create a new component instance.
     */
    
     public function __construct($tourGuides,$places, $languages, $placeTypes)
    {
        $this->tourGuides = $tourGuides;
        $this->places = $places;
        $this->languages = $languages;
        $this->placeTypes = $placeTypes;
    }
    
    /**
     * Get the view / contents that represent the component.
     */

    public function render(): View|Closure|string
    {
        return view('components.tour-guide.tour-guide-grid', [
            'tourGuides' => $this->tourGuides,
            'places' => $this->places,
            'languages' => $this->languages,
            'placeTypes' => $this->placeTypes,
        ]);
    }
}
