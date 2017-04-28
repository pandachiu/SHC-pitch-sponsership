<?php

namespace App\Http\Controllers;

use App\Property;

/**
 * Class PitcController
 * @package App\Http\Controllers
 */
class PitchController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function display()
    {
        $homeGoal = Property::find(5006);
        $awayGoal = Property::find(5007);

        return view('pitch', ['homeGoal' => $homeGoal, 'awayGoal' => $awayGoal]);
    }
}