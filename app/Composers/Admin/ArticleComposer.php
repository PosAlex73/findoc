<?php

namespace App\Composers\Admin;

use App\Enums\BlogStatuses;
use Illuminate\View\View;

class ArticleComposer
{
    public function compose(View $view)
    {
        $view->with('article_statuses', BlogStatuses::getAll());
    }
}
