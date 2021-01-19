<?php
# @Date:   2020-11-11T14:59:27+00:00
# @Last modified time: 2021-01-07T18:37:19+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\Role;
use App\Models\Doctor;
use App\Models\User;


class DoctorController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $doctors = Doctor::all();
      //returning index view
      return view('admin.doctors.index', [
        //this view will have a doctors variable
        'doctors' => $doctors
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Doctor::all();
        return view('admin.doctors.create', [
          'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required|max:191',
          'address' => 'required|max:191',
          'phone' => 'required|numeric|min:7',
          'email' => 'required|max:191|unique:users,email',

          'date_started' => 'required|date_format:Y-m-d',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = Hash::make('secret');
        $user->save();

        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->date_started = $request->input('date_started');
        $doctor->save();

        $request->session()->flash('success', 'Doctor added successfully.');

        return redirect()->route('admin.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);

        return view('admin.doctors.show', [
          'doctor' => $doctor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //text fields will be filled in with the doctor we edit
      $doctor = Doctor::findOrFail($id);

      return view('admin.doctors.edit', [
        'doctor' => $doctor
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $doctor = Doctor::findOrFail($id);

      $request->validate([
        'name' => 'required|max:191',
        'address' => 'required|max:191',
        'phone' => 'required|numeric|min:7',
        'email' => 'required|max:191|unique:users,email,' . $doctor->user_id,

        'date_started' => 'required|date_format:Y-m-d',
      ]);

      $user = User::findOrFail($doctor->user_id);
      $user->name = $request->input('name');
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');
      $user->email = $request->input('email');
      $user->save();

      //$doctor->user_id = ->id;
      $doctor->date_started = $request->input('date_started');
      $doctor->save();

      $request->session()->flash('info', 'Doctor edited successfully.');

      return redirect()->route('admin.doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        $request->session()->flash('danger', 'Doctor deleted successfully.');

        return redirect()->route('admin.doctors.index');
    }
}
