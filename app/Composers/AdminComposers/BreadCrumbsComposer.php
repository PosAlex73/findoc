<?php

namespace App\Composers\AdminComposers;

use App\BreadCrumbs\BreadCrumbs;
use Illuminate\View\View;

class BreadCrumbsComposer
{
    public function compose(View $view)
    {
        $view->with('bread_crumbs', BreadCrumbs::getBreadCrumbs());
    }
}
