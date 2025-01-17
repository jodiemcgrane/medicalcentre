<?php
# @Date:   2020-11-13T16:38:39+00:00
# @Last modified time: 2021-01-07T16:10:01+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\Role;
use App\Models\Patient;
use App\Models\User;
use App\Models\InsuranceCompany;

class PatientController extends Controller
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
      $patients = Patient::all();
      //$patients = Role::where('name', 'patient')->first()->users()->get();
      return view('admin.patients.index', [
        'patients' => $patients
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users = User::all();
      $insuranceCompanies = InsuranceCompany::all();
      return view('admin.patients.create', [
        'users' => $users,
        'insuranceCompanies' => $insuranceCompanies
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
            'email' => 'required|max:191',

            'insurance_id' => 'required',
            'policy_number' => 'required|alpha_num|size:13|unique:patients,policy_number',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = Hash::make('secret');
        $user->save();

        $patient = new Patient();
        $patient->insurance_id = $request->input('insurance_id');
        $patient->policy_number = $request->input('policy_number');
        $patient->user_id = $user->id;
        $patient->save();

        //
        // $user = new User();
        // $user->name = $request->input('name');
        // $user->address = $request->input('address');
        // $user->phone = $request->input('phone');
        // $user->email = $request->input('email');
        // $user->save();
        //
        // $patient = new Patient();
        // $patient->user_id = $user->id;
        // $patient->insurance = $request->input('insurance');
        // $patient->insurance_company = $request->input('insurance_company');
        // $patient->policy_number = $request->input('policy_number');
        // $patient->save();

        $request->session()->flash('success', 'Patient added successfully.');

        return redirect()->route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
      $patient = Patient::findOrFail($id);

      return view('admin.patients.show', [
        'patient' => $patient
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
      $patient = Patient::findOrFail($id);
      //$user = User::all();
      $insuranceCompanies = InsuranceCompany::all();

    //  dd($insurance_companies);

      return view('admin.patients.edit', [
        //'user' => $user,
        'patient' => $patient,
        'insuranceCompanies' => $insuranceCompanies
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

      $patient = Patient::findOrFail($id);

      $request->validate([
          'name' => 'required|max:191',
          'address' => 'required|max:191',
          'phone' => 'required|numeric|min:7',
          'email' => 'required|max:191|unique:users,email,' . $patient->user_id,

          'insurance_id' => 'required',
          'policy_number' => 'required|alpha_num|size:13|unique:patients,policy_number,' . $id,
      ]);

      $user = User::findOrFail($patient->user_id);
      $user->name = $request->input('name');
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');
      $user->email = $request->input('email');
      $user->save();

      //$patient->user_id = $user->id;
      $patient->insurance_id = $request->input('insurance_id');
      $patient->policy_number = $request->input('policy_number');
      $patient->save();

      $request->session()->flash('info', 'Patient edited successfully.');

      return redirect()->route('admin.patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        $request->session()->flash('danger', 'Patient deleted successfully.');

        return redirect()->route('admin.patients.index');
    }
}
