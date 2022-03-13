<?php

namespace App\Composers\Common;

use App\Enums\Specs\RecordType;
use App\Models\Spec;
use Illuminate\View\View;

class DoctorComposer
{
    public function compose(View $view)
    {
        $view->with('doctors', Spec::all());
        $view->with('record_types', RecordType::getAll());
    }
}
