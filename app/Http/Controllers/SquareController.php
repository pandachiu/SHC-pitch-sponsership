<?php

namespace App\Http\Controllers;

use App\Property;

class SquareController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function display($id)
    {
        $property = Property::find($id);

        return view('property',['property' => $property]);
    }
}