<?php
# @Date:   2020-11-05T16:37:46+00:00
# @Last modified time: 2020-11-13T15:52:53+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $home = 'home';

        if($user->hasRole('admin')){
          $home = 'admin.home';
        }
        else if ($user->hasRole('doctor')) {
          $home = 'doctor.home';
        }
        else if ($user->hasRole('patient')) {
          $home = 'patient.home';
        }
        else if ($user->hasRole('visit')) {
          $home = 'visit.home';
        }
        return redirect()->route($home);
    }
}
