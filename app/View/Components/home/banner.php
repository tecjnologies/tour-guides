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
    /**
     * Create a new component instance.
     */
    public function __construct($banner, $places , $placeTypes)
    {
        $this->banner = $banner;
        $this->places = $places;
        $this->placeTypes = $placeTypes;
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
        ]);
    }
}
