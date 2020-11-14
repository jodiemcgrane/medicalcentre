<?php
# @Date:   2020-11-13T16:38:39+00:00
# @Last modified time: 2020-11-14T11:08:06+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

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
      //returning index view
      return view('admin.patients.index', [
        //this view will have a patients variable
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
        return view('admin.patients.create');
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

            'insurance' => 'required|max:191',
            'insurance_company' => 'required|max:191',
            'policy_number' => 'required|alpha_num|size:13|unique:patients,policy_number',
        ]);

        $patient = new Patient();
        $patient->name = $request->input('name');
        $patient->address = $request->input('address');
        $patient->phone = $request->input('phone');
        $patient->email = $request->input('email');

        $patient->insurance = $request->input('insurance');
        $patient->insurance_company = $request->input('insurance_company');
        $patient->policy_number = $request->input('policy_number');
        $patient->save();

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

      return view('admin.patients.edit', [
        'patient' => $patient
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
      $request->validate([
          'name' => 'required|max:191',
          'address' => 'required|max:191',
          'phone' => 'required|numeric|min:7',
          'email' => 'required|max:191',

          'insurance' => 'required|max:191',
          'insurance_company' => 'required|max:191',
          'policy_number' => 'required|alpha_num|size:13|unique:patients,policy_number,' . $id,
      ]);

      $patient = Patient::findOrFail($id);
      $patient->name = $request->input('name');
      $patient->address = $request->input('address');
      $patient->phone = $request->input('phone');
      $patient->email = $request->input('email');

      $patient->insurance = $request->input('insurance');
      $patient->insurance_company = $request->input('insurance_company');
      $patient->policy_number = $request->input('policy_number');
      $patient->save();

      return redirect()->route('admin.patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('admin.patients.index');
    }
}
