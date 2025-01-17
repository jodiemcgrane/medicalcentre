<?php
# @Date:   2020-11-13T16:41:38+00:00
# @Last modified time: 2021-01-03T17:21:47+00:00




namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\Patient;
use App\Models\Doctor;
use Auth;

class VisitController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin,doctor');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //the specific doctor user can view their visits
      $user = Auth::user();
      $visits = $user->doctor->visits()->orderBy('date', 'asc')->paginate(8);

      //$visits = Visit::all();

      //returning index view
      return view('doctor.visits.index', [
        //this view will have a visits variable
        'visits' => $visits
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $visits = Visit::all();
        $patients = Patient::all();
        $doctors = Doctor::all();

        return view('doctor.visits.create', [
          'vistis' => $visits,
          'patients' => $patients,
          'doctors' => $doctors
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

        'patient_id' => 'required',
        'doctor_id' => 'required',

        'date' => 'required|date_format:Y-m-d',
        'time' => 'required|date_format:H:i',
        'duration'=> 'required|max:191',
        'cost' => 'required|numeric|min:0',
      ]);

      $visit = new Visit();
      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $request->input('doctor_id');

      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->duration = $request->input('duration');
      $visit->cost = $request->input('cost');
      //$visit->doctor_id = Auth::id();
      $visit->save();

      $request->session()->flash('success', 'Visit added successfully.');

      return redirect()->route('doctor.visits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
      $visit = Visit::findOrFail($id);

      return view('doctor.visits.show', [
        'visit' => $visit
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
      $visit = Visit::findOrFail($id);
      $patients = Patient::all();
      $doctors = Doctor::all();

      return view('doctor.visits.edit', [
        'visit' => $visit,
        'patients' => $patients,
        'doctors' => $doctors
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
          'patient_id' => 'required',
          'doctor_id' => 'required',
          'date' => 'required|date_format:Y-m-d',
          'time' => 'required|date_format:H:i',
          'duration'=> 'required|max:191',
          'cost' => 'required|numeric|min:0',
        ]);

        $visit = Visit::findOrFail($id);
        $visit->patient_id = $request->input('patient_id');
        $visit->doctor_id = $request->input('doctor_id');

        $visit->date = $request->input('date');
        $visit->time = $request->input('time');
        $visit->duration = $request->input('duration');
        $visit->cost = $request->input('cost');
        $visit->save();

        $request->session()->flash('info', 'Visit edited successfully.');

        return redirect()->route('doctor.visits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $id)
    {
        $visit = Visit::findOrFail($id);
        $visit->delete();

        $request->session()->flash('danger', 'Visit deleted successfully.');

        return redirect()->route('doctor.visits.index');
    }
}
