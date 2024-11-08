<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    public $menu;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menu = collect(config('menu'))->map(function ($item){
            $item['active'] = request()->routeIs($item['routeIs'] ?? $item['route']);

            return $item;
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu');
    }
}
