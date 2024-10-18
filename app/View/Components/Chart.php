<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Chart extends Component
{
    public $chart;
    
    public function __construct($chart)
    {
        $this->chart = $chart;
    }
    
    public function render()
    {
        return view('components.chart');
    }
}
