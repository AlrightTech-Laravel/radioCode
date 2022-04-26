<?php

namespace App\View\Components;

use App\Models\Manufacturer;
use Illuminate\View\Component;

class WebsiteLayout extends Component
{
    public $manufacturers;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->manufacturers = Manufacturer::where('status', 2)->orderBy('title')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.website');
    }
}
