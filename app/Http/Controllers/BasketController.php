<?php

namespace App\Http\Controllers;

use App\Basket;

/**
 * Class PitchSectionController
 * @package App\Http\Controllers
 */
class BasketController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the profile for the given user.
     *
     * @return view
     */
    public function show()
    {
        $basket = Basket::where('user_id', Auth::user()->id)->first();

        if (!$basket) {
            $basket = new Basket();
            $basket->user_id = Auth::user()->id;
            $basket->save();
        }

        $basketitems = $basket->basketItems;
        $total = 0;
        foreach ($basketitems as $item) {
            $total += $item->property->price;
        }

        return view('basket', ['basketItems' => $basketitems, 'total' => $total]);

    }
}