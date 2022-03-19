<?php

namespace App\Composers\Admin;

use App\Enums\Promo\PromoStatuses;
use Illuminate\View\View;

class PromoComposer
{
    public function compose(View $view)
    {
        $view->with('promo_statuses', PromoStatuses::getAll());
    }
}
