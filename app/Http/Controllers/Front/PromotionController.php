<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Promotion;

class PromotionController extends Controller
{
    public function view(Promotion $promotion)
    {
        return view('front.views.promotions.view', [
            ['promotions' => $promotion]
        ]);
    }
}
