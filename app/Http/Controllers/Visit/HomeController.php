<?php
# @Date:   2020-11-05T17:17:25+00:00
# @Last modified time: 2020-11-12T12:48:22+00:00




namespace App\Http\Controllers\Visit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //visit user is secretary
        $this->middleware('role:admin,doctor,visit');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('visit.home');
    }
}
