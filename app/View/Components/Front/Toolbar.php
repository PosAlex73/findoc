<?php

namespace App\View\Components\Front;

use App\Menus\Front\MainToolbar;
use Illuminate\View\Component;

class Toolbar extends Component
{
    public $menu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menu = MainToolbar::getMenu();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.toolbar');
    }
}
