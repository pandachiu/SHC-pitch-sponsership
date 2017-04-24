<?php

namespace App\Http\Controllers;

use App\Property;

class PitchSectionController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function display($id)
    {
        $properties = Property::where('section_id', $id)->get();

        $ordered_properties = [];

        foreach ($properties as $property) {
            $ordered_properties[$property->row][] = $property;
        }

        return view('pitchSection', ['properties' => $ordered_properties]);
    }
}