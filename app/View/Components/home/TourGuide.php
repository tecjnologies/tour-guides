<?php

namespace App\View\Components\home;

use App\Models\Tourtype;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TourGuide extends Component
{
    public $data;
    public $options; // Add this property

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data, $options) // Accept $options as well
    {
        $this->data = $data;
        $this->options = $options; // Assign options to the class property
    }

    public function tourtype(){
        return $this->belongsTo(Tourtype::class);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
         return view('components.home.tour-guide', [
            'data' => $this->data,
            'options' => $this->options,
        ]);
    }
}