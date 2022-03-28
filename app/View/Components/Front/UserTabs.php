<?php

namespace App\View\Components\Front;

use Illuminate\View\Component;

class UserTabs extends Component
{
    public $tabs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tabs = \App\Menus\Front\UserTabs::getMenu();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.user-tabs');
    }
}
