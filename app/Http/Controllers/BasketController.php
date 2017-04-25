<?php

namespace App\Http\Controllers;

use App\Basket;
use App\BasketItem;
use Illuminate\Support\Facades\Auth;

/**
 * Class PitchSectionController
 * @package App\Http\Controllers
 */
class BasketController extends Controller
{

    /**
     * BasketController constructor.
     */
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

        $basketitems = ($basket->basketItem) ? $basket->basketItem : [];
        $total = 0;

        foreach ($basketitems as $item) {
            $total += $item->property->price;
        }

        return view('basket', ['basketItems' => $basketitems, 'total' => $total]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeItem($id)
    {
        BasketItem::destroy($id);

        return redirect()->route('basket.display')->with('success', 'Item deleted from basket!');;
    }
}