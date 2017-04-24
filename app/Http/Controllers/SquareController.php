<?php

namespace App\Http\Controllers;

use App\Basket;
use App\BasketItem;
use App\Property;
use Illuminate\Support\Facades\Auth;

/**
 * Class SquareController
 * @package App\Http\Controllers
 */
class SquareController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function display($id)
    {
        $property = Property::find($id);

        return view('property', ['property' => $property]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function addToBasket($id)
    {
        $basket = Basket::where('user_id', Auth::user()->id)->first();

        if (!$basket) {
            $basket = new Basket();
            $basket->user_id = Auth::user()->id;
            $basket->save();
        }

        $itemExists = BasketItem::where('basket_id', $basket->id)->where('property_id', $id)->get()->isEmpty();
        if (!$itemExists) {
            return redirect()->route('square.display', ['id' => $id])->with('error', 'Item already exists in basket');
        }

        $cartItem = new BasketItem();
        $cartItem->property_id = $id;
        $cartItem->basket_id = $basket->id;
        $cartItem->save();

        return redirect()->route('square.display', ['id' => $id])->with('success', 'Item Added to basket!');
    }
}