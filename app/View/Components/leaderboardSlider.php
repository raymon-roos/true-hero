<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class leaderboardSlider extends Component
{
    public $heroes;

    /**
     * Create a new component instance.
     */
    public function __construct($heroes)
    {
        $this->heroes = $heroes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.leaderboard-slider');
    }
}
