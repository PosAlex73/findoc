<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
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
