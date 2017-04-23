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
        $cart = Basket::where('user_id', Auth::user()->id)->first();

        if (!$cart) {
            $cart = new Basket();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }

        $items = $cart->cartItems;
        $total = 0;
        foreach ($items as $item) {
            $total += $item->product->price;
        }

        return view('cart.view', ['items' => $items, 'total' => $total]);

    }
}