<?php

namespace App\Http\Controllers;

use App\Property;

/**
 * Class PitchSectionController
 * @package App\Http\Controllers
 */
class PitchSectionController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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