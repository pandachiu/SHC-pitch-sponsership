<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{

    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function display()
    {
        return view('profile', ['user' => Auth::user()]);
    }

    /**
     * @param $Request $request
     * @return mixed
     */
    public function save(Request $request)
    {
        Auth::user()->signature = $request->get('signature');
        Auth::user()->save();

        return redirect()->route('profile.display')->with('success', 'Your Signature has been updated!');
    }
}