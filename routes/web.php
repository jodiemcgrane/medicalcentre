<?php
# @Date:   2020-11-02T15:35:08+00:00
# @Last modified time: 2020-12-19T15:14:32+00:00




use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

//admin user
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Admin\PatientController as AdminPatientController;
use App\Http\Controllers\Admin\VisitController as AdminVisitController;

//doctor user
use App\Http\Controllers\Doctor\HomeController as DoctorHomeController;
use App\Http\Controllers\Doctor\VisitController as DoctorVisitController;

//patient user
use App\Http\Controllers\Patient\HomeController as PatientHomeController;
use App\Http\Controllers\Patient\VisitController as PatientVisitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//displaying the welcome method in page controller which returns welcome view
Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//home page routes for each user when they login
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home');
Route::get('/doctor/home', [DoctorHomeController::class, 'index'])->name('doctor.home');
Route::get('/patient/home', [PatientHomeController::class, 'index'])->name('patient.home');
Route::get('/visit/home', [VisitHomeController::class, 'index'])->name('visit.home');

//admin routes for doctor
Route::get('/admin/doctors', [AdminDoctorController::class, 'index'])->name('admin.doctors.index');
Route::get('/admin/doctors/create', [AdminDoctorController::class, 'create'])->name('admin.doctors.create');
Route::get('/admin/doctors/{id}', [AdminDoctorController::class, 'show'])->name('admin.doctors.show');
Route::post('/admin/doctors/store', [AdminDoctorController::class, 'store'])->name('admin.doctors.store');
Route::get('/admin/doctors/{id}/edit', [AdminDoctorController::class, 'edit'])->name('admin.doctors.edit');
Route::put('/admin/doctors/{id}', [AdminDoctorController::class, 'update'])->name('admin.doctors.update');
Route::delete('/admin/doctors/{id}', [AdminDoctorController::class, 'destroy'])->name('admin.doctors.destroy');

//admin routes for patient
Route::get('/admin/patients', [AdminPatientController::class, 'index'])->name('admin.patients.index');
Route::get('/admin/patients/create', [AdminPatientController::class, 'create'])->name('admin.patients.create');
Route::get('/admin/patients/{id}', [AdminPatientController::class, 'show'])->name('admin.patients.show');
Route::post('/admin/patients/store', [AdminPatientController::class, 'store'])->name('admin.patients.store');
Route::get('/admin/patients/{id}/edit', [AdminPatientController::class, 'edit'])->name('admin.patients.edit');
Route::put('/admin/patients/{id}', [AdminPatientController::class, 'update'])->name('admin.patients.update');
Route::delete('/admin/patients/{id}', [AdminPatientController::class, 'destroy'])->name('admin.patients.destroy');

//admin routes for visit
Route::get('/admin/visits', [AdminVisitController::class, 'index'])->name('admin.visits.index');
Route::get('/admin/visits/create', [AdminVisitController::class, 'create'])->name('admin.visits.create');
Route::get('/admin/visits/{id}', [AdminVisitController::class, 'show'])->name('admin.visits.show');
Route::post('/admin/visits/store', [AdminVisitController::class, 'store'])->name('admin.visits.store');
Route::get('/admin/visits/{id}/edit', [AdminVisitController::class, 'edit'])->name('admin.visits.edit');
Route::put('/admin/visits/{id}', [AdminVisitController::class, 'update'])->name('admin.visits.update');
Route::delete('/admin/visits/{id}', [AdminVisitController::class, 'destroy'])->name('admin.visits.destroy');

//doctor user routes
Route::get('/doctor/visits', [DoctorVisitController::class, 'index'])->name('doctor.visits.index');
Route::get('/doctor/visits/create', [DoctorVisitController::class, 'create'])->name('doctor.visits.create');
Route::get('/doctor/visits/{id}', [DoctorVisitController::class, 'show'])->name('doctor.visits.show');
Route::post('/doctor/visits/store', [DoctorVisitController::class, 'store'])->name('doctor.visits.store');
Route::get('/doctor/visits/{id}/edit', [DoctorVisitController::class, 'edit'])->name('doctor.visits.edit');
Route::put('/doctor/visits/{id}', [DoctorVisitController::class, 'update'])->name('doctor.visits.update');
Route::delete('/doctor/visits/{id}', [DoctorVisitController::class, 'destroy'])->name('doctor.visits.destroy');


//patient user routes
Route::get('/patient/visits', [PatientVisitController::class, 'index'])->name('patient.visits.index');
//Route::get('/doctor/visits/create', [PatientVisitController::class, 'create'])->name('doctor.visits.create');
Route::get('/patient/visits/{id}', [PatientVisitController::class, 'show'])->name('patient.visits.show');
//Route::post('/doctor/visits/store', [PatientVisitController::class, 'store'])->name('doctor.visits.store');
//Route::get('/doctor/visits/{id}/edit', [PatientVisitController::class, 'edit'])->name('doctor.visits.edit');
//Route::put('/doctor/visits/{id}', [PatientVisitController::class, 'update'])->name('doctor.visits.update');
Route::delete('/patient/visits/{id}', [PatientVisitController::class, 'destroy'])->name('patient.visits.destroy');
