<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Http\Requests\Request;
use App\Property;

/**
 * Class PitchSectionController
 * @package App\Http\Controllers
 */
class PitchSectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the profile for the given user.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function show(Request $request)
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