<?php

namespace App\View\Components\home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class banner extends Component
{

    public $banner;
    public $places;
    public $placeTypes;
    public $emirates;
    /**
     * Create a new component instance.
     */
    public function __construct($banner, $places , $placeTypes, $districts=[])
    {
        
        $this->banner = $banner;
        $this->places = $places;
        $this->placeTypes = $placeTypes;
        $this->emirates = $districts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..home.banner',[
            'banner'=> $this->banner,
            'places'=> $this->places,
            'placeTypes'=> $this->placeTypes,
            'emirates' => $this->emirates
        ]);
    }
}
